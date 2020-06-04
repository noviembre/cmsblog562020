<?php
    /**
     * User: Invidato
     * Date: 6/4/2020
     * Time: 10:00 AM
     */

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;


    class UserConfirmRequest extends FormRequest
    {

        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return true;
        }

        public function rules()
        {
            return [
                //
            ];

        }

    }