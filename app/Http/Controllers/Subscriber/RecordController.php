<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordController extends Controller
{
    public function index () {

    }
    public function create () {

    }

    public function store (Request $request) {
        // $this->validate([

        // ]);
        $subscriber_id = session('subscriber_id');

        $record['total_cholesterol'] = $record->total_cholesterol;
        $record['subscriber_id'] = $subscriber_id;
        $record['triglyceride'] = $record->triglyceride;
        $record['ldl'] = $record->ldl;
        $record['hdl'] = $record->hdl;

        $record = Record::create($record);

        if (isset($record)) :
            return redirect()->with('success', 'The record has been added successfully');
        else :
            return redirect()->with('danger', 'There was an error encountered, when trying to add the record');
        endif;
    }
    public function edit ($id) {

    }

    public function update (Request $request, $id) {

        $record['total_cholesterol'] = $record->total_cholesterol;
        $record['triglyceride'] = $record->triglyceride;
        $record['ldl'] = $record->ldl;
        $record['hdl'] = $record->hdl;
    }
}
