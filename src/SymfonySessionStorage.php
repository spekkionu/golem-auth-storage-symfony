<?php
namespace Golem\Auth\Storage;

use Symfony\Component\HttpFoundation\Session\Session;

class SymfonySessionStorage implements StorageInterface
{
    /**
     * Class constructor
     * @param Session $session
     * @param string  $namespace
     */
    public function __construct(Session $session, $namespace = 'golem_auth')
    {
        $this->session = $session;
        $this->namespace = $namespace;
    }

    /**
     * @param string|int $id
     * @return void
     */
    public function store($id)
    {
        $this->session->set($this->namespace, $id);
    }

    /**
     * @return string|int
     */
    public function read()
    {
        return $this->session->get($this->namespace, null);
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return $this->session->has($this->namespace);
    }

    /**
     * Clears out identity
     */
    public function clear()
    {
        $this->session->remove($this->namespace);
    }
}
