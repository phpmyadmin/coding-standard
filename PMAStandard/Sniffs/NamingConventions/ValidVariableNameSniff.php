<?php
/**
 * Checks the naming of variables and member variables.
 *
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2015 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 */
namespace PhpMyAdmin\Sniffs\NamingConventions;

use PHP_CodeSniffer\Standards\Zend\Sniffs\NamingConventions\ValidVariableNameSniff as ZendValidVariableNameSniff;
use PHP_CodeSniffer\Util\Common;
use PHP_CodeSniffer\Files\File;

class ValidVariableNameSniff extends ZendValidVariableNameSniff
{
    /**
     * Processes class member variables.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being scanned.
     * @param int                         $stackPtr  The position of the current token in the
     *                                               stack passed in $tokens.
     *
     * @return void
     */
    protected function processMemberVar(File $phpcsFile, $stackPtr)
    {
        $tokens      = $phpcsFile->getTokens();
        $varName     = ltrim($tokens[$stackPtr]['content'], '$');
        $memberProps = $phpcsFile->getMemberProperties($stackPtr);
        if (empty($memberProps) === true) {
            // Exception encountered.
            return;
        }

        $public = ($memberProps['scope'] === 'public');

        if (Common::isCamelCaps($varName, false, $public, false) === false) {
            $error = 'Member variable "%s" is not in valid camel caps format';
            $data  = [$varName];
            $phpcsFile->addError($error, $stackPtr, 'MemberVarNotCamelCaps', $data);
        } else if (preg_match('|\d|', $varName) === 1) {
            $warning = 'Member variable "%s" contains numbers but this is discouraged';
            $data    = [$varName];
            $phpcsFile->addWarning($warning, $stackPtr, 'MemberVarContainsNumbers', $data);
        }
    }//end processMemberVar()
}//end class
