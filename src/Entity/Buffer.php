<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\BufferController;
use App\Repository\BufferRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BufferRepository::class)]
#[ApiResource(
    
    collectionOperations: [
        'next' => [
            'pagination_enable' => false,
            'path' => '/next',
            'method' => 'get',
            'controller' => BufferController::class,
            'read' => false,
            'openapi_context' => [
                'security' => [['bearerAuth' => []]]
            ]
        ],
        'post' => [
            "security" => "is_granted('ROLE_SYSTEM')",
            'openapi_context' => [
                'security' => [['bearerAuth' => []]]
            ]
        ]
    ],
    itemOperations: [
        'get' => [
            "security" => "is_granted('ROLE_SYSTEM')",
            'openapi_context' => [
                'security' => [['bearerAuth' => []]]
            ]
        ]
    ],
    normalizationContext: ['groups' => ['read:User']]
)]
class Buffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $uri;

    #[ORM\Column(type: 'string', length: 6)]
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status = "WAITING";
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
