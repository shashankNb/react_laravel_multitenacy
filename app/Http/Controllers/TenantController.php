<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TenantController extends Controller
{
    protected Tenant $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function index()
    {

        $tenant = $this->tenant->all();
        return view('admin.tenantManage', ['tenants' => $tenant]);
    }

    public function updateTenant(Request $request, $id)
    {

        if ($request->isMethod('GET')) {

            $tenant = $this->tenant->find($id);

            if ($tenant == null && $id != 0) {
                abort(Response::HTTP_UNAUTHORIZED);
            }

            return view('admin.tenant', ['data' => $tenant]);

        } elseif ($request->isMethod('POST')) {

            $rqData = $request->except('_token');

            $tenant = new Tenant();

            if ($id != 0) {
                $tenant = $this->tenant->findOrFail($id);
                if ($request->hasFile('logo') && !empty($tenant->logo)) {
                    if(file_exists(public_path('logo/'.$tenant->logo))) {
                        unlink(public_path('logo/'.$tenant->logo));
                    }
                }
            }

            $tenant->name = $rqData['inputCustomer'];
            $tenant->domain = $rqData['inputAccessDomain'];
            $tenant->database = $rqData['inputDB'];
            $tenant->expiry = $rqData['inputExpiryDate'];
            $tenant->no_of_users = $rqData['inputNoOfUsers'];
            $tenant->status = $rqData['inputStatus'];

            if ($request->hasfile('inputCompanyLogo')) {
                $file = $request->file('inputCompanyLogo');
                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFileName = preg_replace('/[^a-zA-Z0-9_.]/', '_', $originalFileName);
                $name = $originalFileName . '_' . Carbon::now()->format('Ymdhis') . '.' . $file->extension();
                $file->move(public_path() . '/logo', $name);
                $tenant->logo = $name;
            }

            try {
                $tenant->save();

                return redirect()->route('tenant.manage')->with('success', 'Customer Updated Successfully');
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        } else {
            abort(Response::HTTP_UNAUTHORIZED);
        }
    }

    public function deleteTenant(int $tenantId) {
        Tenant::findOrFail($tenantId)->delete();
        return redirect()->route('tenant.manage')->with('success', 'Customer Updated Successfully');
    }
}
