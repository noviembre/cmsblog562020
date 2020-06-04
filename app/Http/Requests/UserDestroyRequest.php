<?php
    /**
     * User: Invidato
     * Date: 6/4/2020
     * Time: 10:38 AM
     */

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;


    class UserDestroyRequest extends FormRequest
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