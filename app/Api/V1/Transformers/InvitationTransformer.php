<?php
namespace Tournament\API\V1\Transformers;

use League\Fractal\TransformerAbstract;
use Tournament\Entities\Invitation;
use Tournament\Properties\Fields;

/**
 * Description of InvitationTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class InvitationTransformer extends BaseTransformer
{
    public function transform(Invitation $invitation)
    {
        return [
            Fields::INVITATION_ID                  => $invitation->id,
            Fields::INVITATION_APPLIER_USER_ID     => $invitation->applier_user_id,
            Fields::INVITATION_REFERRED_USER_ID    => $invitation->referred_user_id,
            Fields::INVITATION_REPLY               => $invitation->reply
        ];
    }
}
