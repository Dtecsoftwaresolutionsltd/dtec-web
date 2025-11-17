<?php

namespace Modules\SupportTicket\App\Models;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportTicketMessage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'support_ticket_id',
        'message_user_id',
        'send_by',
        'message',
        'is_seen'
    ];

    /**
     * Get the support ticket that owns the message.
     */
    public function support_ticket(): BelongsTo
    {
        return $this->belongsTo(SupportTicket::class, 'support_ticket_id');
    }

    /**
     * Get the user that sent the message.
     */
    public function message_user(): BelongsTo
    {
        if ($this->send_by === 'admin') {
            return $this->belongsTo(Admin::class, 'message_user_id');
        }
        return $this->belongsTo(User::class, 'message_user_id');
    }

    /**
     * Get the documents for the message.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(MessageDocument::class, 'message_id', 'id')->where('model_name', 'SupportTicketMessage');
    }

    /**
     * Mark message as seen
     */
    public function markAsSeen(): void
    {
        $this->update(['is_seen' => 1]);
    }

    /**
     * Mark message as unseen
     */
    public function markAsUnseen(): void
    {
        $this->update(['is_seen' => 0]);
    }
}
