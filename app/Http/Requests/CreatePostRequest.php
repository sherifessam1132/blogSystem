<?php

namespace App\Http\Requests;

use App\Models\Reply;
use App\Rules\SpamFree;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Gate;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create',new Reply);
    }
    public function failedAuthorization()
    {
//        parent::failedAuthorization(); // TODO: Change the autogenerated stub
        throw new ThrottleRequestsException('you are replying to frequently.please take a break.');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body'=>['required',new SpamFree()]
        ];
    }
}