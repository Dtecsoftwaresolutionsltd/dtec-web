<?php

namespace Modules\SupportTicket\App\Models;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportTicket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'user_type',
        'ticket_id',
        'subject',
        'status'
    ];

    /**
     * Get the user that owns the support ticket.
     */
    public function user(): BelongsTo
    {
        if ($this->user_type === 'admin') {
            return $this->belongsTo(Admin::class, 'user_id');
        }
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the messages for the support ticket.
     */
    public function ticket_messages(): HasMany
    {
        return $this->hasMany(SupportTicketMessage::class, 'support_ticket_id');
    }

    /**
     * Get count of unseen messages for admin (messages sent by user that admin hasn't seen)
     */
    public function getUnseenMessagesForAdminCount(): int
    {
        return $this->ticket_messages()
            ->where('send_by', 'user')
            ->where('is_seen', 0)
            ->count();
    }

    /**
     * Get count of unseen messages for user (messages sent by admin that user hasn't seen)
     */
    public function getUnseenMessagesForUserCount(): int
    {
        return $this->ticket_messages()
            ->where('send_by', 'admin')
            ->where('is_seen', 0)
            ->count();
    }

    /**
     * Get total count of tickets with unseen messages for admin
     */
    public static function getTotalUnseenMessagesForAdmin(): int
    {
        return SupportTicket::whereHas('ticket_messages', function($query) {
                $query->where('send_by', 'user')->where('is_seen', 0);
            })
            ->count();
    }

    /**
     * Get total count of tickets with unseen messages for user
     */
    public static function getTotalUnseenMessagesForUser($userId): int
    {
        return SupportTicket::where('user_id', $userId)
            ->where('user_type', 'user')
            ->whereHas('ticket_messages', function($query) {
                $query->where('send_by', 'admin')->where('is_seen', 0);
            })
            ->count();
    }
}
