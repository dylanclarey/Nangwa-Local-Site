<?php
namespace CoyoteEdge\Modules\Shortcodes\Lib;

use CoyoteEdge\Modules\Shortcodes\Accordion\Accordion;
use CoyoteEdge\Modules\Shortcodes\AccordionTab\AccordionTab;
use CoyoteEdge\Modules\Shortcodes\Blockquote\Blockquote;
use CoyoteEdge\Modules\Shortcodes\BlogList\BlogList;
use CoyoteEdge\Modules\Shortcodes\BlogSlider\BlogSlider;
use CoyoteEdge\Modules\Shortcodes\Button\Button;
use CoyoteEdge\Modules\Shortcodes\CallToAction\CallToAction;
use CoyoteEdge\Modules\Shortcodes\Counter\Countdown;
use CoyoteEdge\Modules\Shortcodes\Counter\Counter;
use CoyoteEdge\Modules\Shortcodes\CustomFont\CustomFont;
use CoyoteEdge\Modules\Shortcodes\Dropcaps\Dropcaps;
use CoyoteEdge\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use CoyoteEdge\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use CoyoteEdge\Modules\Shortcodes\GoogleMap\GoogleMap;
use CoyoteEdge\Modules\Shortcodes\Highlight\Highlight;
use CoyoteEdge\Modules\Shortcodes\Icon\Icon;
use CoyoteEdge\Modules\Shortcodes\IconListItem\IconListItem;
use CoyoteEdge\Modules\Shortcodes\IconWithText\IconWithText;
use CoyoteEdge\Modules\Shortcodes\ImageGallery\ImageGallery;
use CoyoteEdge\Modules\Shortcodes\Message\Message;
use CoyoteEdge\Modules\Shortcodes\OrderedList\OrderedList;
use CoyoteEdge\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use CoyoteEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use CoyoteEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use CoyoteEdge\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use CoyoteEdge\Modules\Shortcodes\PricingTables\PricingTables;
use CoyoteEdge\Modules\Shortcodes\PricingTable\PricingTable;
use CoyoteEdge\Modules\Shortcodes\Process\ProcessHolder;
use CoyoteEdge\Modules\Shortcodes\Process\ProcessItem;
use CoyoteEdge\Modules\Shortcodes\ProgressBar\ProgressBar;
use CoyoteEdge\Modules\Shortcodes\RestaurantMenu\RestaurantMenu;
use CoyoteEdge\Modules\Shortcodes\RestaurantMenuItem\RestaurantMenuItem;
use CoyoteEdge\Modules\Shortcodes\Separator\Separator;
use CoyoteEdge\Modules\Shortcodes\SocialShare\SocialShare;
use CoyoteEdge\Modules\Shortcodes\Tabs\Tabs;
use CoyoteEdge\Modules\Shortcodes\Tab\Tab;
use CoyoteEdge\Modules\Shortcodes\Team\Team;
use CoyoteEdge\Modules\Shortcodes\UnorderedList\UnorderedList;
use CoyoteEdge\Modules\Shortcodes\VerticalSplitSlider\VerticalSplitSlider;
use CoyoteEdge\Modules\Shortcodes\VerticalSplitSliderContentItem\VerticalSplitSliderContentItem;
use CoyoteEdge\Modules\Shortcodes\VerticalSplitSliderLeftPanel\VerticalSplitSliderLeftPanel;
use CoyoteEdge\Modules\Shortcodes\VerticalSplitSliderRightPanel\VerticalSplitSliderRightPanel;
use CoyoteEdge\Modules\Shortcodes\VideoButton\VideoButton;
use CoyoteEdge\Modules\Shortcodes\Clients\Clients;
use CoyoteEdge\Modules\Shortcodes\Client\Client;
use CoyoteEdge\Modules\Shortcodes\SectionSubtitle\SectionSubtitle;
use CoyoteEdge\Modules\Shortcodes\SectionTitle\SectionTitle;
use CoyoteEdge\Modules\Shortcodes\SectionHolder\SectionHolder;
use CoyoteEdge\Modules\Shortcodes\SectionItem\SectionItem;
use CoyoteEdge\Modules\Shortcodes\ImageWithText\ImageWithText;
use CoyoteEdge\Modules\Shortcodes\TextSlider\TextSlider;
use CoyoteEdge\Modules\Shortcodes\TextSliderItem\TextSliderItem;
use CoyoteEdge\Modules\Shortcodes\InteractiveItems\InteractiveItems;
use CoyoteEdge\Modules\Shortcodes\InteractiveItem\InteractiveItem;
use CoyoteEdge\Modules\Shortcodes\Banner\Banner;
use CoyoteEdge\Modules\Shortcodes\ItemShowcase\ItemShowcase;
use CoyoteEdge\Modules\Shortcodes\ItemShowcaseListItem\ItemShowcaseListItem;
use CoyoteEdge\Modules\Shortcodes\ShopMasonry\ShopMasonry;
use CoyoteEdge\Modules\Shortcodes\CardsGallery\CardsGallery;
use CoyoteEdge\Modules\Shortcodes\ScatteredImages\ScatteredImages;
use CoyoteEdge\Modules\Shortcodes\InteractiveImage\InteractiveImage;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new BlogSlider());
		$this->addShortcode(new Button());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new Icon());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new Message());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new PieChartBasic());
		$this->addShortcode(new PieChartPie());
		$this->addShortcode(new PieChartDoughnut());
		$this->addShortcode(new PieChartWithIcon());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new ProgressBar());
		$this->addShortcode(new ProcessHolder());
		$this->addShortcode(new ProcessItem());
        $this->addShortcode(new RestaurantMenu());
        $this->addShortcode(new RestaurantMenuItem());
		$this->addShortcode(new Separator());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new Team());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new VideoButton());
		$this->addShortcode(new VerticalSplitSlider());
		$this->addShortcode(new VerticalSplitSliderLeftPanel());
		$this->addShortcode(new VerticalSplitSliderRightPanel());
		$this->addShortcode(new VerticalSplitSliderContentItem());
		$this->addShortcode(new Clients());
		$this->addShortcode(new Client());
		$this->addShortcode(new SectionSubtitle());
		$this->addShortcode(new SectionTitle());
		$this->addShortcode(new SectionHolder());
		$this->addShortcode(new SectionItem());
		$this->addShortcode(new ImageWithText());
		$this->addShortcode(new TextSlider());
		$this->addShortcode(new TextSliderItem());
		$this->addShortcode(new InteractiveItems());
		$this->addShortcode(new InteractiveItem());
		$this->addShortcode(new Banner());
		$this->addShortcode(new ItemShowcase());
		$this->addShortcode(new ItemShowcaseListItem());
		$this->addShortcode(new CardsGallery());
		$this->addShortcode(new ScatteredImages());
		$this->addShortcode(new interactiveImage());
		if(coyote_edge_is_woocommerce_installed()){
			$this->addShortcode(new ShopMasonry());
		}
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();