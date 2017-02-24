<?php
$Query	=	$mysqli->query("SELECT * FROM `fs_comics` ORDER BY `created` DESC;");

if ($Query->num_rows > 0) 
{
	while( $row = $Query->fetch_array())
	{
		$name 		= $row["name"];
		$author		= $row["author"];
		$summary	= $row["description"];
		$thumbnail	= $row["thumbnail"];
		$uniqid		= $row["uniqid"];
		$nospace = str_replace(' ','-',$name);
		
		$nid = $nospace.'_'.$uniqid;
		$tthumb = 'thumb_'.$thumbnail;
		$fp = 'manga/content/comics/'.$nid.'/'.$tthumb;
		
		$Articles	.=<<<HTML
		<div class="panel panel-default panel-post">
							<div class="panel-body">
								<div class="post">
									<div class="post-header post-author">
										<a href="#" class="author" data-toggle="tooltip" title="YAKUZI"><img src="../css/img/avatar/{$authora['avatar']}" alt=""></a>
										<div class="post-title">
											<h3><a href="blog-post.html">{$row["name"]}</a></h3>
											<ul class="post-meta">
												<li><a href="#"><i class="fa fa-user"></i>{$row["author"]}</a></li>
												<li><i class="fa fa-calendar-o"></i></li>
												
											</ul>
										</div>
									</div>
									<div class="post-thumbnail">
										<a href="blog-post.html"><img src="{$fp}" alt=""></a>
										
									</div>
									{$row["description"]}
								</div>
							</div>
HTML;
	}
}
echo	'<table borderless>';
echo 	$Articles;
echo	'</article>';
