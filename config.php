<?php

const DEVELOP_MODE = true;

const DB_HOST = 'localhost:3307';
//const DB_HOST = 'localhost:3307';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'mysitecomuus';


const EXT = '.php';
const  SEP = '\\';

const ABS_PATH = __DIR__.SEP;
const CORE_PATH = ABS_PATH."core".SEP;
const DB_PATH = ABS_PATH."db".SEP;
const MODELS_PATH = ABS_PATH."models".SEP;
const CONTRL_PATH = ABS_PATH."controllers".SEP;


const VIEWS_PATH = ABS_PATH."views".SEP;
const PAGES_PATH = VIEWS_PATH."pages".SEP;

const ADMIN_PATH = ABS_PATH."controlpanel/";
const ADM_CORE_PATH = ADMIN_PATH."core/";
const ADM_CONTRL_PATH = ADMIN_PATH."controllers/";
const ADM_MODELS_PATH = ADMIN_PATH."models/";
const ADM_VIEWS_PATH = ADMIN_PATH."views/";
const ADM_PAGES_PATH = ADM_VIEWS_PATH."pages/";



