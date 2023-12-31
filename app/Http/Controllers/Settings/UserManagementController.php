<?php


namespace App\Http\Controllers\Settings;


use App\Http\Controllers\Controller;
use App\Http\Resources\Settings\User\UserListResource;
use App\Services\Settings\User\UserManagementService;
use Illuminate\Http\Request;
use Inertia\Inertia;


class UserManagementController extends Controller
{

    public function __construct(UserManagementService $userManagementService)
    {
        $this->userManagementService = $userManagementService;
    }

    public function index()
    {
        return Inertia::render('admin/settings/user/index', [
            "title" => 'POS | User managements',
            "additional" => [
                'role_list' => ''
            ]
        ]);
    }

    public function getData(Request $request)
    {
        try {
            $data = $this->userManagementService->getData($request);

            $result = new UserListResource($data);
            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }
}
