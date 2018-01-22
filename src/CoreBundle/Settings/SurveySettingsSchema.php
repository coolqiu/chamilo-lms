<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Settings;

use Chamilo\CoreBundle\Form\Type\YesNoType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sylius\Bundle\SettingsBundle\Schema\SettingsBuilderInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class SurveySettingsSchema
 * @package Chamilo\CoreBundle\Settings
 */
class SurveySettingsSchema extends AbstractSettingsSchema
{
    /**
     * {@inheritdoc}
     */
    public function buildSettings(SettingsBuilderInterface $builder)
    {
        $builder
            ->setDefaults(
                [
                    'survey_email_sender_noreply' => 'coach',
                    'extend_rights_for_coach_on_survey' => 'true',

                ]
            );
//            ->setAllowedTypes(
//                array(
//                    //'survey_email_sender_noreply' => array('string'),
//                )
//            );
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder)
    {
        $builder
            ->add(
                'survey_email_sender_noreply',
                ChoiceType::class,
                [
                    'choices' => [
                        'CourseCoachEmailSender' => 'coach',
                        'NoReplyEmailSender' => 'noreply',
                    ],
                ]
            )
            ->add('extend_rights_for_coach_on_survey', YesNoType::class);
    }
}
