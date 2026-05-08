<?php
/**
 * Shihab Nexus - Central Configuration
 * Define base URL and paths for the entire application.
 */

// Auto-detect base URL from server
$sshihabb007_protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$sshihabb007_host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
$sshihabb007_script   = $_SERVER['SCRIPT_NAME'] ?? '';

// Find the base dir (e.g. /webPhp/NeonGlassAxiom)
$shihab_parts      = explode('/', trim($sshihabb007_script, '/'));
$mehedi_base_parts = array_slice($shihab_parts, 0, 2); // adjust depth as needed
$shihab_base_url   = '/' . implode('/', $mehedi_base_parts);

define('SHIHAB_BASE_URL',  $shihab_base_url);                        // e.g. /webPhp/NeonGlassAxiom
define('SHIHAB_BASE_PATH', dirname(__DIR__));                         // absolute filesystem root
define('SHIHAB_PAGES',     SHIHAB_BASE_URL . '/pages');              // /webPhp/NeonGlassAxiom/pages
define('SHIHAB_ACTIONS',   SHIHAB_BASE_URL . '/actions');            // /webPhp/NeonGlassAxiom/actions
define('SHIHAB_ADMIN',     SHIHAB_BASE_URL . '/admin');              // /webPhp/NeonGlassAxiom/admin
