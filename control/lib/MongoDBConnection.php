<?php

class MongoDBConnection
{
    private static $_db = null;

    public static function getMongoCon($new = false)
    { //allow for another connection, you never know...
        $isRemote = true;
        if($isRemote){
            if (self::$_db === null) {

                $OPENSHIFT_USERNAME = 'admin';
                $OPENSHIFT_PASSWORD = 'qWgkUeguxiPj';
                $OPENSHIFT_MONGODB_DB_HOST = getenv('OPENSHIFT_MONGODB_DB_HOST');
                $OPENSHIFT_MONGODB_DB_PORT = getenv('OPENSHIFT_MONGODB_DB_PORT');


                self::$_db = new MongoClient('mongodb://' . $OPENSHIFT_USERNAME . ':' . $OPENSHIFT_PASSWORD . '@' . $OPENSHIFT_MONGODB_DB_HOST . ':' . $OPENSHIFT_MONGODB_DB_PORT . '/');
            }
            if (true === !!$new) {
                return new MongoClient('mongodb://' . $OPENSHIFT_USERNAME . ':' . $OPENSHIFT_PASSWORD . '@' . $OPENSHIFT_MONGODB_DB_HOST . ':' . $OPENSHIFT_MONGODB_DB_PORT . '/');
            }
            return self::$_db;
        }else{
            if (self::$_db === null) {

                $OPENSHIFT_MONGODB_DB_HOST = 'localhost';
                $OPENSHIFT_MONGODB_DB_PORT = 27017;

                self::$_db = new MongoClient('mongodb://'. $OPENSHIFT_MONGODB_DB_HOST . ':' . $OPENSHIFT_MONGODB_DB_PORT . '/');
            }
            if (true === !!$new) {
                return new MongoClient('mongodb://'. $OPENSHIFT_MONGODB_DB_HOST . ':' . $OPENSHIFT_MONGODB_DB_PORT . '/');
            }
            return self::$_db;
        }

    }
}

?>