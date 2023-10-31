<?php

/*
 * Replaced by composer autoloader PSR-4
 */

class Autoloader {
    /**
     * @type string
     */
    protected $namespacePrefix = '';

    /**
     * @type string
     */
    protected $baseDir = '';


    public function __construct( string $namespacePrefix, string $baseDir ){

        $this->setNamespacePrefix( $namespacePrefix );
        $this->setBaseDir( $baseDir );
        $this->register();
    }
    /**
     * Sets the namespace's prefix.
     * Only classes with this namespace will be autoloaded.
     *
     * @param string $prefix
     */
    public function setNamespacePrefix( string $prefix ): void {
        $this->namespacePrefix = $prefix;
    }

    /**
     * Sets the base directory, where we can find our php files.
     *
     * @param string $dir
     */
    public function setBaseDir( string $dir ): void {
        $this->baseDir = $dir;
    }

    /**
     * Register our autoloader.
     *
     * @return void
     */
    public function register(): void {
        spl_autoload_register( function( $class ) {
            if (!preg_match('/^' . preg_quote($this->namespacePrefix) . '/', $class)) {
                // Don't register a class without our namespace's prefix
                return;
            }

            $relativeClass = substr( $class, strlen( $this->namespacePrefix ));

            $file = $this->baseDir . str_replace( '\\', DIRECTORY_SEPARATOR, $relativeClass ) . '.php';

            if ( file_exists( $file )) {
                require_once( $file );
            }
        });
    }
}