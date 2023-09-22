<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditApp extends Component
{
    use WithFileUploads;

    public int $id;

    public string $slug = '';

    public string $name = '';

    public array $screenshots = [];

    public string $short_description;

    public string $description;

    public $icon;

    public $formErrors;

    public $nameErrors;

    public function rules()
    {
        $rules = [
//            'slug' => ['required', 'unique:apps,slug,' . $this->slug],
            'name' => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],
        ];

        if ($this->icon !== '') {
            $rules['icon'] = ['nullable'];
        } else {
            $rules['icon'] = ['required', 'image', 'mimes:png', 'max:1024', 'dimensions:width=512,height=512'];
        }

        return $rules;
    }

    public function iconUpdated()
    {
        dd("Sddf");
    }

    #[Computed]
    public function iconUrl()
    {
        $app = App::find($this->id);
        return $app->iconUrl ?? '';
    }

    public function mount(App $app)
    {
        $appData = $app->toArray();

        $appData['screenshots'] = [json_decode($app->screenshots)];

        $this->fill($appData);
    }

    public function submit()
    {
        $app = App::find($this->id);
        $data = $this->validate();

        $data['screenshots'] = json_encode(['path' => $data['icon']]);
        $data['publisher_id'] = auth()->id();

        if (!is_string($data['icon'])) {
            $x = $this->icon->storePubliclyAs(null, \Str::uuid() . '.png', 'icon');

            $data['icon'] = $this->icon->storePubliclyAs(null, \Str::uuid() . '.png', 'icon');
        }

        $app->update($data);
        $this->redirect($app->url);
    }

    public function render()
    {
        return view('livewire.edit-app');
    }
}
