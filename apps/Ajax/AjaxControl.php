<?php

class AjaxControl extends AjaxApplication implements ApplicationFreeAccess
{

    function subscribe(){
        $p = $this->message;
        $m = new Message();
        $m->urn = "urn-simplesubscription";
        $m->action = "subscribe";
        $m->email = $p->email;
        $subscribed = $m->deliver();

        println($subscribed);
        return $subscribed;
    }

    function comment(){
        $p = $this->message;

        $m = new Message();
        $m->urn = 'urn-'.$p->type;
        $m->action = "create";
        $m->name = $p->name;
        $m->text = $p->text;
        if($p->which == 'item') $m->item = $p->urn;
        elseif($p->which == 'blog') $m->blog = $p->urn;
        if($p->email) $m->email = $p->email;
        $comment = $m->deliver();
        return $comment;
    }

    function countview(){
        $p = $this->message;
//        return $p;

        $m = new Message();
        $m->action = 'load';
        $m->urn = $p->urn;
        $item = $m->deliver();

        $countview = $item->countview;
        $countview += 1;

        $m = new Message();
        $m->action = 'update';
        $m->urn = $item->urn;
        $m->countview = $countview;
        $m->deliver();
    }

    function question() {
        $p = $this->message;

        $m = new Message();
        $m->urn = 'urn-question';
        $m->action = "create";
        if($p->name) $m->name = $p->name;
        if($p->text) $m->text = $p->text;
        if($p->email) $m->email = $p->email;
        if($p->phone) $m->phone = $p->phone;
        $question = $m->deliver();

        Mail::send(SITE_NAME, SITE_NAME, "info@whitebride.com.ua", SITE_NAME, 'Вопрос', $question);

        return $question;
    }
}

?>
