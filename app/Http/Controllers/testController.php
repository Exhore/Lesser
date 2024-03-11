<?php

namespace App\Http\Controllers;
/* cada vez que quiera utilizar un controlador manejado por inertia, tengo que importar su libreria */

use Inertia\Inertia;

class testController extends Controller
{
    public function index()
    {
        return Inertia::render('Test', ['test_val' => 'prop value']);
    }

    // This the way to provide value for the prop that we created in the Test component

    // We don't need to write full name of
    // component with extension, we only need to write
    // component name and it will be automatically
    // imported from the Pages folder
}
