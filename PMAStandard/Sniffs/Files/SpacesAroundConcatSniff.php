<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Class for a sniff to oblige whitespaces before and after a concatenation operator
 *
 * This Sniff check if a whitespace is missing before or after any concatenation
 * operator.
 * The concatenation operator is identified by the PHP token T_STRING_CONCAT
 * The whitespace is identified by the PHP token T_WHITESPACE
 *
 * PHP version 5
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @since    September, the 12th 2013
 */
namespace PMAStandard\Sniffs\Files;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Sniff to oblige whitespaces before and after a concatenation operator
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @name     SpacesAroundConcatSniff
 * @version  Release: 1.0
 */
class SpacesAroundConcatSniff implements Sniff
{
    /**
     * Returns the token types that this sniff is interested in.
     *
     * @name register
     * @access public
     * @see PHP_CodeSniffer\Sniffs\Sniff::register()
     *
     * @return array(int)
     */
    public function register()
    {
        return array(T_STRING_CONCAT);
    }//end register()

    /**
     * Processes the tokens that this sniff is interested in.
     *
     * @name process
     * @access public
     * @see PHP_CodeSniffer\Sniffs\Sniff::process()
     * @param File $phpcsFile The file where the token was found.
     * @param int  $stackPtr  The position in the stack where the token was found.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if ($tokens[$stackPtr-1]['type'] !== 'T_WHITESPACE') {
            $warning = 'Whitespace is expected before any concat operator "."';
            $phpcsFile->addWarning($warning, $stackPtr, 'Found');
        }
        if ($tokens[$stackPtr+1]['type'] !== 'T_WHITESPACE') {
            $warning = 'Whitespace is expected after any concat operator "."';
            $phpcsFile->addWarning($warning, $stackPtr, 'Found');
        }
    }//end process()
}//end class
