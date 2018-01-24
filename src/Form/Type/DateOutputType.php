<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\FormExtensions\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class DateOutputType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['format']       = $options['format'];
        $view->vars['defaultValue'] = $options['default'];
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefaults([
                'default'    => '',
                'format'     => null,
                'data_class' => \DateTime::class,
                'required'   => false,
                'disabled'   => true,
            ])
            ->setAllowedTypes('default', 'string')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'date_output';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return OutputType::class;
    }
}
