{include file="header.tpl" title=foo}

<PRE>
Title: {$title|capitalize}
An example of section looped foreach:
</PRE>

{foreach $users as $user}
<p><fieldset>
    Login: {$user.user_login}
    <br>
    Fullname: {$user.user_fullname}
    <br>
    Email: {$user.user_email}
    <br>
</fieldset></p>
{/foreach}

{include file="footer.tpl"}
