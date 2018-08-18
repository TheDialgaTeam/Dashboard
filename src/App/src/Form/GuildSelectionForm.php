<?php

namespace App\Form;

use RestCord\Model\Guild\Guild;
use Zend\Expressive\Csrf\SessionCsrfGuard;
use Zend\Expressive\Session\SessionInterface;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Select;

/**
 * Class GuildSelectionForm
 * @package App\Form
 */
class GuildSelectionForm extends CsrfGuardedForm
{
    /**
     * GuildSelectionForm constructor.
     * @param SessionCsrfGuard $guard
     * @param SessionInterface $session
     * @param Guild[] $guilds
     */
    public function __construct(SessionCsrfGuard $guard, SessionInterface $session, $guilds)
    {
        parent::__construct($guard, $session, 'csrf_guild_selection_form');

        $guildIdOptions = array();

        foreach ($guilds as $guild) {
            if ($guild->permissions & 0x28) {
                // User has ADMINISTRATOR OR MANAGE_GUILD
                $guildIdOptions[$guild->id] = $guild->name;
            }
        }

        if (count($guildIdOptions) == 0) {
            $this->add([
                'name' => 'guildId',
                'type' => Select::class,
                'attributes' => [
                    'class' => 'custom-select guildId'
                ],
                'options' => [
                    'empty_option' => 'No Guild Available'
                ]
            ]);
        } else {
            $this->add([
                'name' => 'guildId',
                'type' => Select::class,
                'attributes' => [
                    'class' => 'custom-select guildId'
                ],
                'options' => [
                    'empty_option' => 'Select Server',
                    'value_options' => $guildIdOptions
                ]
            ]);
        }

        $this->add([
            'name' => 'action',
            'type' => Hidden::class,
            'attributes' => [
                'value' => 'discordGuildAuthentication'
            ]
        ]);
    }
}