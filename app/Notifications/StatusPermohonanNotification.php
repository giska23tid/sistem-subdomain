<?php

namespace App\Notifications;

use App\Models\Permohonan;
use App\Models\SuratTindakLanjut;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class StatusPermohonanNotification extends Notification
{
    use Queueable;

    protected Permohonan $permohonan;
    protected ?SuratTindakLanjut $surat;

    public function __construct(
        Permohonan $permohonan,
        ?SuratTindakLanjut $surat = null
    ) {
        $this->permohonan = $permohonan;
        $this->surat = $surat;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $permohonan = $this->permohonan;

        $jenis = $permohonan->jenis_permohonan === 'pendaftaran'
            ? 'Pendaftaran Subdomain'
            : 'Perubahan Nama Subdomain';

        $mail = (new MailMessage)
            ->subject('Informasi Status Permohonan Subdomain')
            ->greeting('Yth. ' . $notifiable->name)
            ->line('Terdapat pembaruan status permohonan subdomain Anda.')
            ->line('Jenis Permohonan: ' . $jenis)
            ->line('Nama Subdomain: ' . $permohonan->nama_subdomain)
            ->line('Status: ' . ucfirst($permohonan->status));

        if ($permohonan->status === 'diterima') {
            $mail->line('Permohonan Anda telah diterima oleh petugas Diskominfotik.')
                ->line('Surat tindak lanjut terlampir pada email ini.');
        } else {
            $mail->line('Mohon maaf, permohonan Anda belum dapat diterima.')
                ->line('Alasan penolakan: ' . $permohonan->catatan);
        }

        $mail->line('Silakan masuk ke sistem informasi subdomain untuk melihat informasi lebih lanjut.')
            ->salutation('Hormat kami, Diskominfotik Kabupaten Indragiri Hulu');

        if (
            $permohonan->status === 'diterima' &&
            $this->surat &&
            Storage::disk('public')->exists($this->surat->file_pdf)
        ) {
            $mail->attach(
                Storage::disk('public')->path($this->surat->file_pdf),
                [
                    'as' => 'Surat-Tindak-Lanjut.pdf',
                    'mime' => 'application/pdf',
                ]
            );
        }

        return $mail;
    }

    public function toArray(object $notifiable): array
    {
        $permohonan = $this->permohonan;

        return [
            'permohonan_id' => $permohonan->id,
            'jenis_permohonan' => $permohonan->jenis_permohonan,
            'nama_subdomain' => $permohonan->nama_subdomain,
            'status' => $permohonan->status,
            'catatan' => $permohonan->catatan,
            'pesan' => $permohonan->status === 'diterima'
                ? 'Permohonan subdomain Anda telah diterima.'
                : 'Permohonan subdomain Anda ditolak. Silakan periksa alasan penolakan.',
            'tanggal' => now()->toDateTimeString(),
        ];
    }
}
