<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * An Authentication mechanism.
 *
 * @author Chris Corbyn
 */
interface Swift_Transport_Esmtp_Authenticator
{
    /**
     * Get the name of the AUTH mechanism this Authenticator handles.
     *
     * @return string
     */
    public function getAuthKeyword();

    /**
     * Try to authenticate the user with $roll_no and $password.
     *
     * @param Swift_Transport_SmtpAgent $agent
     * @param string                    $roll_no
     * @param string                    $password
     *
     * @return bool
     */
    public function authenticate(Swift_Transport_SmtpAgent $agent, $roll_no, $password);
}
