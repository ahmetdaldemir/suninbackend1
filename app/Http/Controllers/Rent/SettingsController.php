<?php
namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Rent\Settings\SettingsRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    private SettingsRepositoryInterface $settingsRepository;
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(SettingsRepositoryInterface $settingsRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->settingsRepository = $settingsRepository;
        $this->languageRepository = $languageRepository;
    }

    public function index()
    {
        $session = session()->get('rent_session');
        $data['settings'] = $this->settingsRepository->get();
        $data['settings'] = $this->languageRepository->get();
        return view('rent/settings/index',$data);
    }

    public function store(Request $request)
    {
        $this->settingsRepository->create($request);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $this->settingsRepository->update($request);
        return redirect()->back();
    }
}
