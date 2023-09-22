<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitApp extends Component
{
    use WithFileUploads;

    #[Url(as: 'step', history: true, keep: true)]
    public string $step = 'info';

    #[Url(as: 'app_id', history: true, keep: true)]
    public string $appId;

    #[Rule('required')]
    public string $name = '';

    public array $screenshots = [];

    #[Rule('required')]
    public string $short_description;

    #[Rule('required')]
    public string $description;

    #[Rule('required', message: 'The Icon field is required.')]
    #[Rule('image', message: 'The file must be an image.')]
    #[Rule('mimes:png', message: 'The file must be a file of type: png.')]
    #[Rule('max:1024', message: 'The image must be smaller than 1MB.')]
    #[Rule('dimensions:width=512,height=512', message: 'The image must be 512x512 pixels.')]
    public $icon;

    public $formErrors;

    public $nameErrors;

    public function mount()
    {
        /*if (session()->has('form')) {
            $sessionForm = json_decode(session()->get('form'), true);
            unset($sessionForm['icon']);
            $this->fill($sessionForm);
            $uplaodedFile = new UploadedFile($sessionForm['icon_real_path'], 'icon.png', 'image/png');
            //            $this->icon = $uplaodedFile;
        }*/
    }

    public function submit()
    {
        $data = $this->validate();
        $data['slug'] = \Str::slug($data['name']);
        $data['screenshots'] = json_encode(['path' => $data['icon']]);
        $data['publisher_id'] = auth()->id();
        $data['icon'] = $this->icon->storePubliclyAs(null, \Str::uuid() . '.png', 'icon');

        $app = App::create($data);
        $this->redirect("/submit-app?step=binaries&app_id={$app->id}");
    }

    /*    public function dehydrate()
        {
            // Runs at the end of every single request...

         $this->formErrors = $this->getErrorBag();
        }*/

    public function render()
    {
        if ($this->step === 'binaries') {
            return view('livewire.submit-app-binaries');
        }

        return view('livewire.submit-app');
    }
}
