<?php

namespace Webvelopers\WhatsAppCloudApi;

use Illuminate\Http\Response;
use Webvelopers\WhatsAppCloudApi\Notifications\Notification;
use Webvelopers\WhatsAppCloudApi\Notifications\NotificationPayload;
use Webvelopers\WhatsAppCloudApi\Http\Requests\VerifyTokenRequest;

class Webhook
{
    /**
     * Verify a Webhook anytime you configure a new one in your App Dashboard.
     */
    public function verifyToken(array $hub, ?string $verify_token = null): Response
    {
        return (new VerifyTokenRequest($verify_token))->validate($hub);
    }

    /**
     * Webhooks are triggered when a customer performs an action or the status
     * for a message a business sends a customer changes.
     */
    public function notification(array $payload): ?Notification
    {
        return (new NotificationPayload())->buildFromPayload($payload);
    }
}
