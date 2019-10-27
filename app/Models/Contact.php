<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = "contact";


    /**
     * get created by user object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }


    /**
     * get modified by user object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modifiedBy()
    {
        return $this->belongsTo(User::class, 'modified_by_id');
    }


    /**
     * get assigned to user object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }


    /**
     * get status object of this contact i.e lead, opportunity, etc.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getStatus()
    {
        return $this->belongsTo(ContactStatus::class, 'status');
    }


    /**
     * get company object of this contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    /**
     * get all documents for this contact (this relation is a many to many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents()
    {
        return $this->belongsToMany(Document::class, 'contact_document', 'contact_id', 'document_id');
    }


    /**
     * get all emails for this contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany(ContactEmail::class, 'contact_id');
    }


    /**
     * get all phones for this contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(ContactPhone::class, 'contact_id');
    }
}
