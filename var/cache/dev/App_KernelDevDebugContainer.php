<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOOuHgxx\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOOuHgxx/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOOuHgxx.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOOuHgxx\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerOOuHgxx\App_KernelDevDebugContainer([
    'container.build_hash' => 'OOuHgxx',
    'container.build_id' => 'b408b0d1',
    'container.build_time' => 1594663767,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOOuHgxx');
