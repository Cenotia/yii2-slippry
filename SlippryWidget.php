<?php
namespace cenotia\slippry;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * SlippryWidget is a wrapper for the [jQuery Slippry Slider Plugin](http://slippry.com).
 *
 * ~~~
 * echo cenotia\slippry\SlippryWidget::widget([
 *    'selector' => '#head_slidder',
 *    'pluginOptions' => [
 *        'responsive' => 1,
 *        'pager' => 1,
 *        'kenZoom' => 120,
 *        'onSliderLoad' => new yii\web\JsExpression('function(c){console.log("slider is loading ");}')
 *     ]
 * ]);
 * ~~~
 *
 * @author xavier <xavier.villamuera@gmail.com>
 *
 */
class SlippryWidget extends Widget
{
	/**
	 * @var string Markup to be used for the entire slider (including the pager)
	 */
	public $slippryWrapper;

	/**
	 * @var string Markup to be used to wrap the slides and controls (think of it as the viewport)
	 */
	public $slideWrapper;
	
	/**
	 * @var string Markup to be used to wrap just the slides.
	 */
	public $slideCrop;

	/**
	 * @var string The class that is applied to the original slide parent element (e.g. the <ul> element).
	 */
	public $boxClass;

	/**
	 * @var string HTML element used for each slide.
	 */
	public $elements;

	/**
	 * @var string The class applied to the current (visible) slide.
	 */
	public $activeClass;

	/**
	 * @var string HTML element used for each slide..
	 */
	public $fillerClass;

	/**
	 * @var string The class for the element that acts as an intrinsic placeholder (basically the element which makes sure the slider is sized correctly).
	 */
	public $loadingClass;

	/**
	 * @var string The slider height should change on the fly according to the current slide.
	 */
	public $adaptiveHeight;

	/**
	 * @var string The slide number that should be displayed first.
	 */
	public $start;

	/**
	 * @var boolean Whether the slider should loop (i.e. the first slide goes to the last, the last slide goes to the first).
	 */
	public $loop;

	/**
	 * @var string Specifies the source of the captions. When img, captions will be taken from the title or alt attributes, when any other element it will be taken from the title attribute.
	 */
	public $captionsSrc;

	/**
	 * @var string The element for the captions. Note, this can be a box outside of .slippry_box.
	 */
	public $captionsEl;

	/**
	 * @var string HTML element used for each slide..
	 */
	public $initSingle;

	/**
	 * @var boolean Whether the slider should be responsive.
	 */
	public $responsive;

	/**
	 * @var string HTML element used for each slide..
	 */
	public $preload;

	/**
	 * @var boolean Whether the slider should have a pager.
	 */
	public $pager;

	/**
	 * @var string The class given to the slider container.
	 */
	public $pagerClass;

	/**
	 * @var boolean Whether the slider should have controls (next, previous arrows).
	 */
	public $controls;

	/**
	 * @var string The class for the controls container.
	 */
	public $controlClass;

	/**
	 * @var string The class for the anchor tag to go to the previous slide (left).
	 */
	public $prevClass;

	/**
	 * @var string The text for the previous slide control (important for screen readers).
	 */
	public $prevText;

	/**
	 * @var string The class for the anchor tag to go to the previous slide (right).
	 */
	public $nextClass;

	/**
	 * @var string The text for the next slide control (important for screen readers).
	 */
	public $nextText;

	/**
	 * @var boolean Hide the previous or next control when it reaches the first or last slide respectively.
	 */
	public $hideOnEnd;

	/**
	 * @var boolean The class given to the slider container.
	 */
	public $transition;

	/**
	 * @var string Max zoom level use for the Ken Burns transition.
	 */
	public $kenZoom;

	/**
	 * @var integer The spacing between slides.
	 */
	public $slideMargin;

	/**
	 * @var string The class applied to the slide element when a transition is in progress.
	 */
	public $transClass;

	/**
	 * @var string The time the transition takes to complete.
	 */
	public $speed;

	/**
	 * @var string The easing effect to use for the selected transition.
	 */
	public $easing;

	/**
	 * @var string Whether the slider should run continuously (seamless transition between the first and last slides).
	 */
	public $continuous;

	/**
	 * @var string The spacing between slides.
	 */
	public $useCSS;

	/**
	 * @var string WWhether the slider should run automatically on load.
	 */
	public $auto;

	/**
	 * @var string Which direction the slider should move in if in auto mode.
	 */
	public $autoDirection;

	/**
	 * @var string Whether the slideshow should pause automatically on hover.
	 */
	public $autoHover;

	/**
	 * @var string The delay (if any) before the slider resumes automatically after hover.
	 */
	public $autoHoverDelay;

	/**
	 * @var string The delay (if any) before the slider runs automatically on load.
	 */
	public $autoDelay;

	
	/**
	 * @var string The delay (if any) before the slider resumes automatically after hover.
	 */
	public $pause;

	/**
	 * @var string Runs when the slider has loaded.
	 */
	public $onSliderLoad;

	/**
	 * @var string Runs before the slide transition starts.
	 */
	public $onSlideBefore;

	/**
	 * @var string Runs after the slide transition has completed.
	 */
	public $onSlideAfter;

	

	
	


	/**
	 * @var array Slippry plugin options see http://slippry.com/
	 */
	public $pluginOptions = [];

	/**
	 * Initializes the widget.
	 *
	 * @throws InvalidConfigException if the "id" property is not set.
	 */
	public function init()
	{
		parent::init();
		if (empty($this->selector)) {
			throw new InvalidConfigException('The "selector" property must be set.');
		}
	}

	/**
	 * Runs the widget.
	 *
	 * @see \yii\base\Widget::run()
	 */
	public function run()
	{
		$this->registerClientScript();
	}

	/**
	 * Registers the needed JavaScript and register the JS initialization code
	 */
	public function registerClientScript()
	{
		$options = empty($this->pluginOptions) ? '' : Json::encode($this->pluginOptions);

		$js = "jQuery(\"{$this->selector}\").slippry(" . $options . ");";

		$view = $this->getView();
		SlippryAsset::register($view);
		$view->registerJs($js);
	}
}
