<form action="<?= $site->find('search')->url() ?>">
  <input type="text" placeholder="search..." name="q">
  <select name="l">
    <option value="posts" selected>Posts</option>
    <option value="site">Site</option>
  </select>
  <button type="submit" value="search">Find!</button>
</form>
