<?php

namespace Backend\Modules\MediaGalleries\Domain\MediaGallery;

use Backend\Modules\MediaLibrary\Domain\MediaGroup\MediaGroup;
use Symfony\Component\Validator\Constraints as Assert;

class MediaGalleryDataTransferObject
{
    /**
     * @var MediaGallery
     */
    private $mediaGalleryEntity;

    /**
     * @var Status
     */
    public $status;

    /**
     * @var int
     */
    public $userId;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $title;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $action;

    /**
     * @var MediaGroup
     */
    public $mediaGroup;

    /**
     * MediaGalleryDataTransferObject constructor.
     *
     * @param MediaGallery|null $mediaGallery
     */
    public function __construct(MediaGallery $mediaGallery = null)
    {
        $this->mediaGalleryEntity = $mediaGallery;

        if (!$this->hasExistingMediaGallery()) {
            return;
        }

        $this->userId = $mediaGallery->getUserId();
        $this->status = $mediaGallery->getStatus();
        $this->title = $mediaGallery->getTitle();
        $this->text = $mediaGallery->getText();
        $this->action = $mediaGallery->getAction();
        $this->mediaGroup = $mediaGallery->getMediaGroup();
    }

    /**
     * @return MediaGallery
     */
    public function getMediaGalleryEntity(): MediaGallery
    {
        return $this->mediaGalleryEntity;
    }

    /**
     * @return bool
     */
    public function hasExistingMediaGallery(): bool
    {
        return $this->mediaGalleryEntity instanceof MediaGallery;
    }

    /**
     * @param MediaGallery $mediaGalleryEntity
     */
    public function setMediaGalleryEntity(MediaGallery $mediaGalleryEntity)
    {
        $this->mediaGalleryEntity = $mediaGalleryEntity;
    }
}