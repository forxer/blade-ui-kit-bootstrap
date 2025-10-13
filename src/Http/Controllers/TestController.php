<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function index(): View
    {
        return view('blade-ui-kit-bootstrap::tests.index');
    }

    public function buttons(): View
    {
        return view('blade-ui-kit-bootstrap::tests.buttons');
    }

    public function alerts(): View
    {
        return view('blade-ui-kit-bootstrap::tests.alerts');
    }

    public function badges(): View
    {
        return view('blade-ui-kit-bootstrap::tests.badges');
    }

    public function forms(): View
    {
        return view('blade-ui-kit-bootstrap::tests.forms');
    }

    public function inputs(): View
    {
        return view('blade-ui-kit-bootstrap::tests.inputs');
    }

    public function modals(): View
    {
        return view('blade-ui-kit-bootstrap::tests.modals');
    }
}
