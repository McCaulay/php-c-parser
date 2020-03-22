<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Stmt;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class IfStmt extends Stmt
{
    /** @var Expr Condition expression */
    public $cond;
    /** @var Stmt[] Statements */
    public $stmts;
    /** @var ElseIfStmt[] Elseif clauses */
    public $elseifs;
    /** @var null|ElseStmt Else clause */
    public $else;

    /**
     * Constructs an if node.
     *
     * @param Expr $cond       Condition
     * @param array     $subNodes   Array of the following optional subnodes:
     *                              'stmts'   => array(): Statements
     *                              'elseifs' => array(): Elseif clauses
     *                              'else'    => null   : Else clause
     * @param array     $attributes Additional attributes
     */
    public function __construct(Expr $cond, array $subNodes = [], array $attributes = []) {
        $this->attributes = $attributes;
        $this->cond = $cond;
        $this->stmts = $subNodes['stmts'] ?? [];
        $this->elseifs = $subNodes['elseifs'] ?? [];
        $this->else = $subNodes['else'] ?? null;
    }

    public function getSubNodeNames() : array {
        return ['cond', 'stmts', 'elseifs', 'else'];
    }
    
    public function getType() : string {
        return 'Stmt_If';
    }
}