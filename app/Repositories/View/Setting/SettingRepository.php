<?php namespace App\Repositories\View\Setting;

use App\Models\Setting;
use App\Repositories\BaseRepository;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    public function get($id) {
        $result = Setting::where('tenant_id', $this->getTenantId())->find($id);
        return $result;
    }

    public function all()
    {
        $result = Setting::where('tenant_id', $this->getTenantId())->first();
        return $result;
    }


}
