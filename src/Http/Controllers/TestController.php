<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function __construct()
    {
        // Configure icon formats for test pages using Bootstrap Icons
        config([
            'blade-ui-kit-bootstrap.btn_start_icon_format' => '<i class="bi bi-%s"></i>',
            'blade-ui-kit-bootstrap.btn_end_icon_format' => '<i class="bi bi-%s"></i>',
            'blade-ui-kit-bootstrap.alert_icon_format' => '<i class="bi bi-%s me-2"></i>',
        ]);

        // Share an empty ViewErrorBag with all test views to prevent undefined $errors variable
        view()->share('errors', session()->get('errors', new \Illuminate\Support\ViewErrorBag()));
    }

    public function index(): View
    {
        return view('blade-ui-kit-bootstrap::tests.index');
    }

    public function buttonsComponents(): View
    {
        return view('blade-ui-kit-bootstrap::tests.buttons.components');
    }

    public function buttonsActions(): View
    {
        return view('blade-ui-kit-bootstrap::tests.buttons.actions');
    }

    public function alerts(): View
    {
        return view('blade-ui-kit-bootstrap::tests.alerts');
    }

    public function badges(): View
    {
        return view('blade-ui-kit-bootstrap::tests.badges');
    }

    public function formsBasics(): View
    {
        return view('blade-ui-kit-bootstrap::tests.forms.basics');
    }

    public function formsComponents(): View
    {
        return view('blade-ui-kit-bootstrap::tests.forms.components');
    }

    public function inputsText(): View
    {
        return view('blade-ui-kit-bootstrap::tests.inputs.text');
    }

    public function inputsAdvanced(): View
    {
        return view('blade-ui-kit-bootstrap::tests.inputs.advanced');
    }

    public function modalsTypes(): View
    {
        return view('blade-ui-kit-bootstrap::tests.modals.types');
    }

    public function modalsVariations(): View
    {
        return view('blade-ui-kit-bootstrap::tests.modals.variations');
    }
}
