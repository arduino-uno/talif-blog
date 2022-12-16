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
<p>&nbsp;</p>

An example of posts looped foreach:
{foreach $posts as $post}
<p><fieldset>
Title:{$post.title}<br>
Body:{$post.body}<br>
Image:<img src="./images/{$post.image}" alt="{$post.image}" height="300px"><br><span align="center">{$post.image}</span><br>
Published:{$post.published}
</fieldset></p>
{/foreach}

{include file="footer.tpl"}
