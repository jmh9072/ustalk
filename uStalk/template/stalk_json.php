{
  "online":<?=time() - strtotime($data['on']) - 60 * 60 * 0 < 15 * 60 ? "true" : "false" ?>,
  "uid":<?=json_encode($data['bid'])?>,
  "avatar":<?=json_encode(ereg_replace("&", "&amp;", $data['avatar'])) ?>,
  "name":<?=json_encode($data['name']) ?>,
  "date":<?=json_encode(date("n/j/Y",strtotime($data['on']))) ?>,
  "time":<?=json_encode(date("H:i",strtotime($data['on']))) ?>
}
