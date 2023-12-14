<?php

namespace DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value;

use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\OutputFormat;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\ParserState;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\SourceException;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\UnexpectedEOFException;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\UnexpectedTokenException;
class URL extends PrimitiveValue
{
    /**
     * @var CSSString
     */
    private $oURL;
    /**
     * @param int $iLineNo
     */
    public function __construct(CSSString $oURL, $iLineNo = 0)
    {
        parent::__construct($iLineNo);
        $this->oURL = $oURL;
    }
    /**
     * @return URL
     *
     * @throws SourceException
     * @throws UnexpectedEOFException
     * @throws UnexpectedTokenException
     */
    public static function parse(ParserState $oParserState)
    {
        $bUseUrl = $oParserState->comes('url', \true);
        if ($bUseUrl) {
            $oParserState->consume('url');
            $oParserState->consumeWhiteSpace();
            $oParserState->consume('(');
        }
        $oParserState->consumeWhiteSpace();
        $oResult = new URL(CSSString::parse($oParserState), $oParserState->currentLine());
        if ($bUseUrl) {
            $oParserState->consumeWhiteSpace();
            $oParserState->consume(')');
        }
        return $oResult;
    }
    /**
     * @return void
     */
    public function setURL(CSSString $oURL)
    {
        $this->oURL = $oURL;
    }
    /**
     * @return CSSString
     */
    public function getURL()
    {
        return $this->oURL;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render(new OutputFormat());
    }
    /**
     * @return string
     */
    public function render(OutputFormat $oOutputFormat)
    {
        return "url({$this->oURL->render($oOutputFormat)})";
    }
}
