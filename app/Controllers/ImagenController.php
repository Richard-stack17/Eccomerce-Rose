<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ImagenModel;
class ImagenController extends Controller{
    public function guardarImagen(){
         // Validar el formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'image' => 'uploaded[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]|max_size[imagen,1024]',
        ]);
        //por si hay un error
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // Obtener la imagen subida
        $imagen = $this->request->getFile('imagen');
        // Guardar la imagen en la base de datos
        $model = new ImagenModel();
        $model->insert([
            'image' => base64_encode(file_get_contents($imagen->getTempName())),
        ]);
        return redirect()->to('/');
    }
}