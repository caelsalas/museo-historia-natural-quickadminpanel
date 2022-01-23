<?php

namespace App\Http\Livewire\BirthdayPackage;

use App\Models\BirthdayPackage;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public BirthdayPackage $birthdayPackage;

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(BirthdayPackage $birthdayPackage)
    {
        $this->birthdayPackage  = $birthdayPackage;
        $this->mediaCollections = [
            'birthday_package_image' => $birthdayPackage->image,
        ];
    }

    public function render()
    {
        return view('livewire.birthday-package.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->birthdayPackage->save();
        $this->syncMedia();

        return redirect()->route('admin.birthday-packages.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->birthdayPackage->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'birthdayPackage.name' => [
                'string',
                'required',
            ],
            'birthdayPackage.description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.birthday_package_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.birthday_package_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'birthdayPackage.published' => [
                'boolean',
            ],
        ];
    }
}
