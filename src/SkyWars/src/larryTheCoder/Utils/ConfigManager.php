<?php

namespace larryTheCoder\Utils;

use pocketmine\utils\Config;
use larryTheCoder\SkyWarsAPI;

/**
 * ConfigManager : SkyWars Config Manager
 * 
 * @copyright (c) 2016, larryTheHarry
 * CurrentVersion: < BETA | Testing >
 * 
 */
class ConfigManager {

    private $id;
    private $plugin;
    public $arena;
    public $mode = 0;

    public function __construct($id, SkyWarsAPI $plugin) {
        $this->id = $id;
        $this->plugin = $plugin;
        $this->arena = new Config($this->plugin->getDataFolder() . "arenas/$id.yml", Config::YAML);
    }

    public function setJoinSign($x, $y, $z, $level) { # OK
        $this->arena->setNested('signs.join_sign_x', $x);
        $this->arena->setNested('signs.join_sign_y', $y);
        $this->arena->setNested('signs.join_sign_z', $z);
        $this->arena->setNested('signs.join_sign_world', $level);
        $this->arena->save();
    }

    public function enableRefillChest($type) {
        if (is_bool($type)) { // make sure if $type is boolean
            $this->arena->setNested('chest.refill', $type);
            $this->arena->save();
        }
    }

    public function setMoney($type) {
        $this->arena->setNested('arena.money_reward', $type);
        $this->arena->save();
    }

    public function setStatus($type) {# OK
        $this->arena->setNested('signs.enable_status', $type);
        $this->arena->save();
    }

    public function setStatusLine($line, $type) {# OK
        $this->arena->setNested("signs.status_line_$line", $type);
        $this->arena->save();
    }

    public function setUpdateTime($type) {# OK
        $this->arena->setNested('signs.sign_update_time', $type);
        $this->arena->save();
    }

    public function setReturnSign($x, $y, $z) {# OK
        $this->arena->setNested('signs.return_sign_x', $x);
        $this->arena->setNested('signs.return_sign_y', $y);
        $this->arena->setNested('signs.return_sign_z', $z);
        $this->arena->save();
    }

    public function setArenaWorld($type) {# OK
        $this->arena->setNested('arena.arena_world', $type);
        $this->arena->save();
    }

    public function setSpectator($data) {# OK
        $this->arena->setNested('arena.spectator_mode', $data);
        $this->arena->save();
    }

    public function setSpecSpawn($x, $y, $z) {# OK
        $this->arena->setNested('arena.spec_spawn_x', $x);
        $this->arena->setNested('arena.spec_spawn_y', $y);
        $this->arena->setNested('arena.spec_spawn_z', $z);
        $this->arena->save();
    }

    public function setMaxTime($data) {# OK
        $this->arena->setNested('arena.max_game_time', $data);
        $this->arena->save();
    }

    public function setMaxPlayers($data) {# OK
        $this->arena->setNested('arena.max_players', $data);
        $this->arena->save();
    }

    public function setMinPlayers($data) {# OK
        $this->arena->setNested('arena.min_players', $data);
        $this->arena->save();
    }

    public function setStartTime($data) {# OK
        $this->arena->setNested('arena.starting_time', $data);
        $this->arena->save();
    }

    public function setTime($data) {# OK
        $this->arena->setNested('arena.time', $data);
        $this->arena->save();
    }

    public function setEnable($data) {# OK
        $this->arena->set('enabled', $data);
        $this->arena->save();
    }

}
