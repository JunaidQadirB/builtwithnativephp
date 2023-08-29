<?php

namespace App\Livewire;

use App\Models\App;
use App\Models\AppCategory;
use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitApp extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public string $name = '';

    public array $screenshots = [];

    #[Rule('required')]
    public string $short_description;

    #[Rule('required')]
    public string $description;

    // only allow png files, max 1MB, min width 512px, min height 512px

    #[Rule(
        rule: 'required|image|mimes:png|max:1024|dimensions:width=512,height=512',
        message: [
            'required' => 'The Icon field is required.',
            'image' => 'The file must be an image.',
            'mimes' => 'The file must be a file of type: png.',
            'max' => 'The image must be smaller than 1MB.',
            'dimensions' => 'The image must be 512x512 pixels.',
        ])]
    public $icon;

    public $formErrors;

    public $nameErrors;

    public function mount()
    {
        if (session()->has('form')) {
            $sessionForm = json_decode(session()->get('form'), true);
            unset($sessionForm['icon']);
            $this->fill($sessionForm);
            $uplaodedFile = new UploadedFile($sessionForm['icon_real_path'], 'icon.png', 'image/png');
            //            $this->icon = $uplaodedFile;
        }
    }

    public function submit()
    {
        $data = $this->validate();
        $data['slug'] = \Str::slug($data['name']);
        $data['screenshots'] = json_encode(['path' => $data['icon']]);
        $data['publisher_id'] = auth()->id();
        $data['icon'] = $this->icon->storePubliclyAs(null, $data['slug'].'.png', 'icon');

        $app = App::create($data);
        $this->redirect($app->url);
    }

    /*    public function dehydrate()
        {
            // Runs at the end of every single request...

         $this->formErrors = $this->getErrorBag();
        }*/

    public function render()
    {
        $categoryOptions = AppCategory::all()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                ];
            })->toArray();

        return view('livewire.submit-app', compact('categoryOptions'));
    }
}
