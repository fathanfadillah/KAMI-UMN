<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('app', array('header' => "Welcome",
			'content' => nl2br("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pretium, metus id condimentum lacinia, nulla felis porttitor enim, nec dignissim sapien nisl quis arcu. Nam mauris ipsum, eleifend ut tincidunt id, auctor non lorem. Vivamus tempor non enim sit amet hendrerit. Sed lacus metus, vehicula non mauris sit amet, efficitur ornare tellus. Sed imperdiet ex sit amet sollicitudin rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi eget elit justo. Suspendisse hendrerit, mi non cursus vehicula, purus nisl malesuada metus, ut cursus leo sapien sit amet nisi. Integer facilisis, ipsum eget interdum laoreet, erat felis consequat nisl, a auctor augue nunc a risus.

Sed ut ex id dolor viverra aliquam. Sed non mi et sem imperdiet sodales. Phasellus aliquet nec velit vel venenatis. Nam nec nibh eget augue fringilla vulputate. Donec ac risus tincidunt, maximus justo id, ultrices nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse ut molestie justo, pretium convallis velit. Nunc consectetur sapien lectus, non vestibulum odio vehicula sed. Cras urna quam, fringilla ut dolor vitae, tempor tempor tortor. Vestibulum vitae pretium neque. Maecenas molestie justo eget sollicitudin vehicula. Cras vitae gravida orci, in laoreet nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras tortor diam, efficitur eget consectetur in, porttitor ut orci. Integer id nisl sed erat sagittis ullamcorper id at urna.

")
		));
	}
}
