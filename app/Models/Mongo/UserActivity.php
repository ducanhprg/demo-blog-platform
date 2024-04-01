<?php

namespace App\Models\Mongo;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class UserActivity extends Eloquent
{
    // Specify the MongoDB connection if it's not the default connection
    protected $connection = 'mongodb';

    // Specify the collection name if it's not the pluralized version of the model name
    protected $collection = 'user_activities';

    // Model's properties
    protected $fillable = [
        'user_id', // Assuming you store a reference to the user
        'activity', // A description or key of the activity
        'details', // Additional details about the activity, can be an array because MongoDB supports it
        'performed_at', // Timestamp of when the activity was performed
    ];

    // If you're using MongoDB's native timestamps
    public $timestamps = false;
}
