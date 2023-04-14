<?php

class Application
{
    private VideoStore $store;

    function __construct(VideoStore $store)
    {
        $this->store = $store;
    }
    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform:\n";
            echo "Choose 0 to EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to rate a Video\n";

            $command = (int) readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    echo "Enter video title: ";
                    $title = readline();
                    $this->store->addVideo(new Video($title));
                    break;
                case 2:
                    $this->store->listInventory();
                    echo "Enter video title to rent: ";
                    $title = readline();
                    $this->store->checkOut($title);
                    break;
                case 3:
                    $this->store->listInventory();
                    echo "Enter video title to return: ";
                    $title = readline();
                    $this->store->returnVideo($title);
                    break;
                case 4:
                    $this->store->listInventory();
                    echo "Enter video title to rate: ";
                    $title = readline();
                    echo "Enter your rating (out of 10): ";
                    $rating = (int) readline();
                    $this->store->rateVideo($title, $rating);
                    break;
                default:
                    echo "Sorry, I don't understand you..\n";
            }
        }
    }
}