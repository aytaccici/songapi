<?php


namespace App\Services\Application;

use App\Contracts\ApplicationContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicationService
{

    protected $applicationContact;

    /**
     * ApplicationService constructor.
     * @param ApplicationContact $applicationContact
     */
    public function __construct(ApplicationContact $applicationContact)
    {
        $this->applicationContact = $applicationContact;
    }


    /** Uygulamanın güncelliğini kontrol edecek olan metod
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function checkUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'application_id'   => 'required',
            'version'          => 'required',
            'language_version' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator;
        }


        if ($this->IsApplicationRequiredUpdate($request) || $this->IsApplicationLanguageRequiredUpdate($request)) {
            $validator->errors()->add('error', 'Application Update Required');
        }

        return $validator;
    }


    /** Uygulamanın güncel olup olmadığnı ve Force update gerekip gerektirmediğini belirliyoruz
     * @param Request $request
     * @return bool
     *
     */
    private function IsApplicationRequiredUpdate(Request $request): bool
    {

        $applicationId = $request->get('application_id');

        $applicationInfo = $this->applicationContact->show($applicationId);

        $stableApplicationVersion = (float)$applicationInfo->version;
        $userApplicationVersion   = (float)$request->version;

        if ($stableApplicationVersion > $userApplicationVersion && $applicationInfo->is_update_required) {

            return true;
        }


        return false;
    }


    /**Uygulamanın  dil dosyalarının güncel olup olmadığnı ve Force update gerekip gerektirmediğini belirliyoruz
     * @param Request $request
     * @return bool
     */
    private function IsApplicationLanguageRequiredUpdate(Request $request): bool
    {

        $applicationId = $request->get('application_id');

        $applicationInfo = $this->applicationContact->show($applicationId);


        $stableApplicationVersion = (float)$applicationInfo->language_version;
        $userApplicationVersion   = (float)$request->language_version;

        if ($stableApplicationVersion > $userApplicationVersion && $applicationInfo->is_update_required) {

            return true;
        }

        return false;
    }
}
