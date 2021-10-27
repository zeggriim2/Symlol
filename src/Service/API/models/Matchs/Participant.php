<?php

namespace App\Service\API\models\Matchs;

class Participant
{
    private int $assists;
    private int $baronKills;
    private int $bountyLevel;
    private int $champExperience;
    private int $champLevel;
    private int $championId;
    private string $championName;
    private int $championTransform;
    private int $consumablesPurchased;
    private int $damageDealtToBuildings;
    private int $damageDealtToObjectives;
    private int $damageDealtToTurrets;
    private int $damageSelfMitigated;
    private int $deaths;
    private int $detectorWardsPlaced;
    private int $doubleKills;
    private int $dragonKills;
    private bool $firstBloodAssist;
    private bool $firstBloodKill;
    private bool $firstTowerAssist;
    private bool $firstTowerKill;
    private bool $gameEndedInEarlySurrender;
    private bool $gameEndedInSurrender;
    private int $goldEarned;
    private int $goldSpent;
    private string $individualPosition;
    private int $inhibitorKills;
    private int $inhibitorTakedowns;
    private int $inhibitorsLost;
    private int $item0;
    private int $item1;
    private int $item2;
    private int $item3;
    private int $item4;
    private int $item5;
    private int $item6;
    private int $itemsPurchased;
    private int $killingSprees;
    private int $kills;
    private string $lane;
    private int $largestCriticalStrike;
    private int $largestKillingSpree;
    private int $largestMultiKill;
    private int $longestTimeSpentLiving;
    private int $magicDamageDealt;
    private int $magicDamageDealtToChampions;
    private int $magicDamageTaken;
    private int $neutralMinionsKilled;
    private int $nexusKills;
    private int $nexusTakedowns;
    private int $nexusLost;
    private int $objectivesStolen;
    private int $objectivesStolenAssists;
    private int $participantId;
    private int $pentaKills;
    private Perk $perks;
    private int $physicalDamageDealt;
    private int $physicalDamageDealtToChampions;
    private int $physicalDamageTaken;
    private int $profileIcon;
    private string $puuid;
    private int $quadraKills;
    private string $riotIdName;
    private string $riotIdTagline;
    private string $role;
    private int $sightWardsBoughtInGame;
    private int $spell1Casts;
    private int $spell2Casts;
    private int $spell3Casts;
    private int $spell4Casts;
    private int $summoner1Casts;
    private int $summoner1Id;
    private int $summoner2Casts;
    private int $summoner2Id;
    private string $summonerId;
    private int $summonerLevel;
    private string $summonerName;
    private bool $teamEarlySurrendered;
    private int $teamId;
    private string $teamPosition;
    private int $timeCCingOthers;
    private int $timePlayed;
    private int $totalDamageDealt;
    private int $totalDamageDealtToChampions;
    private int $totalDamageShieldedOnTeammates;
    private int $totalDamageTaken;
    private int $totalHeal;
    private int $totalHealsOnTeammates;
    private int $totalMinionsKilled;
    private int $totalTimeCCDealt;
    private int $totalTimeSpentDead;
    private int $totalUnitsHealed;
    private int $tripleKills;
    private int $trueDamageDealt;
    private int $trueDamageDealtToChampions;
    private int $trueDamageTaken;
    private int $turretKills;
    private int $turretTakedowns;
    private int $turretsLost;
    private int $unrealKills;
    private int $visionScore;
    private int $visionWardsBoughtInGame;
    private int $wardsKilled;
    private int $wardsPlaced;
    private bool $win;

    /**
     * @return int
     */
    public function getAssists(): int
    {
        return $this->assists;
    }

    /**
     * @param int $assists
     * @return Participant
     */
    public function setAssists(int $assists): Participant
    {
        $this->assists = $assists;
        return $this;
    }

    /**
     * @return int
     */
    public function getBaronKills(): int
    {
        return $this->baronKills;
    }

    /**
     * @param int $baronKills
     * @return Participant
     */
    public function setBaronKills(int $baronKills): Participant
    {
        $this->baronKills = $baronKills;
        return $this;
    }

    /**
     * @return int
     */
    public function getBountyLevel(): int
    {
        return $this->bountyLevel;
    }

    /**
     * @param int $bountyLevel
     * @return Participant
     */
    public function setBountyLevel(int $bountyLevel): Participant
    {
        $this->bountyLevel = $bountyLevel;
        return $this;
    }

    /**
     * @return int
     */
    public function getChampExperience(): int
    {
        return $this->champExperience;
    }

    /**
     * @param int $champExperience
     * @return Participant
     */
    public function setChampExperience(int $champExperience): Participant
    {
        $this->champExperience = $champExperience;
        return $this;
    }

    /**
     * @return int
     */
    public function getChampLevel(): int
    {
        return $this->champLevel;
    }

    /**
     * @param int $champLevel
     * @return Participant
     */
    public function setChampLevel(int $champLevel): Participant
    {
        $this->champLevel = $champLevel;
        return $this;
    }

    /**
     * @return int
     */
    public function getChampionId(): int
    {
        return $this->championId;
    }

    /**
     * @param int $championId
     * @return Participant
     */
    public function setChampionId(int $championId): Participant
    {
        $this->championId = $championId;
        return $this;
    }

    /**
     * @return string
     */
    public function getChampionName(): string
    {
        return $this->championName;
    }

    /**
     * @param string $championName
     * @return Participant
     */
    public function setChampionName(string $championName): Participant
    {
        $this->championName = $championName;
        return $this;
    }

    /**
     * @return int
     */
    public function getChampionTransform(): int
    {
        return $this->championTransform;
    }

    /**
     * @param int $championTransform
     * @return Participant
     */
    public function setChampionTransform(int $championTransform): Participant
    {
        $this->championTransform = $championTransform;
        return $this;
    }

    /**
     * @return int
     */
    public function getConsumablesPurchased(): int
    {
        return $this->consumablesPurchased;
    }

    /**
     * @param int $consumablesPurchased
     * @return Participant
     */
    public function setConsumablesPurchased(int $consumablesPurchased): Participant
    {
        $this->consumablesPurchased = $consumablesPurchased;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamageDealtToBuildings(): int
    {
        return $this->damageDealtToBuildings;
    }

    /**
     * @param int $damageDealtToBuildings
     * @return Participant
     */
    public function setDamageDealtToBuildings(int $damageDealtToBuildings): Participant
    {
        $this->damageDealtToBuildings = $damageDealtToBuildings;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamageDealtToObjectives(): int
    {
        return $this->damageDealtToObjectives;
    }

    /**
     * @param int $damageDealtToObjectives
     * @return Participant
     */
    public function setDamageDealtToObjectives(int $damageDealtToObjectives): Participant
    {
        $this->damageDealtToObjectives = $damageDealtToObjectives;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamageDealtToTurrets(): int
    {
        return $this->damageDealtToTurrets;
    }

    /**
     * @param int $damageDealtToTurrets
     * @return Participant
     */
    public function setDamageDealtToTurrets(int $damageDealtToTurrets): Participant
    {
        $this->damageDealtToTurrets = $damageDealtToTurrets;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamageSelfMitigated(): int
    {
        return $this->damageSelfMitigated;
    }

    /**
     * @param int $damageSelfMitigated
     * @return Participant
     */
    public function setDamageSelfMitigated(int $damageSelfMitigated): Participant
    {
        $this->damageSelfMitigated = $damageSelfMitigated;
        return $this;
    }

    /**
     * @return int
     */
    public function getDeaths(): int
    {
        return $this->deaths;
    }

    /**
     * @param int $deaths
     * @return Participant
     */
    public function setDeaths(int $deaths): Participant
    {
        $this->deaths = $deaths;
        return $this;
    }

    /**
     * @return int
     */
    public function getDetectorWardsPlaced(): int
    {
        return $this->detectorWardsPlaced;
    }

    /**
     * @param int $detectorWardsPlaced
     * @return Participant
     */
    public function setDetectorWardsPlaced(int $detectorWardsPlaced): Participant
    {
        $this->detectorWardsPlaced = $detectorWardsPlaced;
        return $this;
    }

    /**
     * @return int
     */
    public function getDoubleKills(): int
    {
        return $this->doubleKills;
    }

    /**
     * @param int $doubleKills
     * @return Participant
     */
    public function setDoubleKills(int $doubleKills): Participant
    {
        $this->doubleKills = $doubleKills;
        return $this;
    }

    /**
     * @return int
     */
    public function getDragonKills(): int
    {
        return $this->dragonKills;
    }

    /**
     * @param int $dragonKills
     * @return Participant
     */
    public function setDragonKills(int $dragonKills): Participant
    {
        $this->dragonKills = $dragonKills;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFirstBloodAssist(): bool
    {
        return $this->firstBloodAssist;
    }

    /**
     * @param bool $firstBloodAssist
     * @return Participant
     */
    public function setFirstBloodAssist(bool $firstBloodAssist): Participant
    {
        $this->firstBloodAssist = $firstBloodAssist;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFirstBloodKill(): bool
    {
        return $this->firstBloodKill;
    }

    /**
     * @param bool $firstBloodKill
     * @return Participant
     */
    public function setFirstBloodKill(bool $firstBloodKill): Participant
    {
        $this->firstBloodKill = $firstBloodKill;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFirstTowerAssist(): bool
    {
        return $this->firstTowerAssist;
    }

    /**
     * @param bool $firstTowerAssist
     * @return Participant
     */
    public function setFirstTowerAssist(bool $firstTowerAssist): Participant
    {
        $this->firstTowerAssist = $firstTowerAssist;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFirstTowerKill(): bool
    {
        return $this->firstTowerKill;
    }

    /**
     * @param bool $firstTowerKill
     * @return Participant
     */
    public function setFirstTowerKill(bool $firstTowerKill): Participant
    {
        $this->firstTowerKill = $firstTowerKill;
        return $this;
    }

    /**
     * @return bool
     */
    public function isGameEndedInEarlySurrender(): bool
    {
        return $this->gameEndedInEarlySurrender;
    }

    /**
     * @param bool $gameEndedInEarlySurrender
     * @return Participant
     */
    public function setGameEndedInEarlySurrender(bool $gameEndedInEarlySurrender): Participant
    {
        $this->gameEndedInEarlySurrender = $gameEndedInEarlySurrender;
        return $this;
    }

    /**
     * @return bool
     */
    public function isGameEndedInSurrender(): bool
    {
        return $this->gameEndedInSurrender;
    }

    /**
     * @param bool $gameEndedInSurrender
     * @return Participant
     */
    public function setGameEndedInSurrender(bool $gameEndedInSurrender): Participant
    {
        $this->gameEndedInSurrender = $gameEndedInSurrender;
        return $this;
    }

    /**
     * @return int
     */
    public function getGoldEarned(): int
    {
        return $this->goldEarned;
    }

    /**
     * @param int $goldEarned
     * @return Participant
     */
    public function setGoldEarned(int $goldEarned): Participant
    {
        $this->goldEarned = $goldEarned;
        return $this;
    }

    /**
     * @return int
     */
    public function getGoldSpent(): int
    {
        return $this->goldSpent;
    }

    /**
     * @param int $goldSpent
     * @return Participant
     */
    public function setGoldSpent(int $goldSpent): Participant
    {
        $this->goldSpent = $goldSpent;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndividualPosition(): string
    {
        return $this->individualPosition;
    }

    /**
     * @param string $individualPosition
     * @return Participant
     */
    public function setIndividualPosition(string $individualPosition): Participant
    {
        $this->individualPosition = $individualPosition;
        return $this;
    }

    /**
     * @return int
     */
    public function getInhibitorKills(): int
    {
        return $this->inhibitorKills;
    }

    /**
     * @param int $inhibitorKills
     * @return Participant
     */
    public function setInhibitorKills(int $inhibitorKills): Participant
    {
        $this->inhibitorKills = $inhibitorKills;
        return $this;
    }

    /**
     * @return int
     */
    public function getInhibitorTakedowns(): int
    {
        return $this->inhibitorTakedowns;
    }

    /**
     * @param int $inhibitorTakedowns
     * @return Participant
     */
    public function setInhibitorTakedowns(int $inhibitorTakedowns): Participant
    {
        $this->inhibitorTakedowns = $inhibitorTakedowns;
        return $this;
    }

    /**
     * @return int
     */
    public function getInhibitorsLost(): int
    {
        return $this->inhibitorsLost;
    }

    /**
     * @param int $inhibitorsLost
     * @return Participant
     */
    public function setInhibitorsLost(int $inhibitorsLost): Participant
    {
        $this->inhibitorsLost = $inhibitorsLost;
        return $this;
    }

    /**
     * @return int
     */
    public function getItem0(): int
    {
        return $this->item0;
    }

    /**
     * @param int $item0
     * @return Participant
     */
    public function setItem0(int $item0): Participant
    {
        $this->item0 = $item0;
        return $this;
    }

    /**
     * @return int
     */
    public function getItem1(): int
    {
        return $this->item1;
    }

    /**
     * @param int $item1
     * @return Participant
     */
    public function setItem1(int $item1): Participant
    {
        $this->item1 = $item1;
        return $this;
    }

    /**
     * @return int
     */
    public function getItem2(): int
    {
        return $this->item2;
    }

    /**
     * @param int $item2
     * @return Participant
     */
    public function setItem2(int $item2): Participant
    {
        $this->item2 = $item2;
        return $this;
    }

    /**
     * @return int
     */
    public function getItem3(): int
    {
        return $this->item3;
    }

    /**
     * @param int $item3
     * @return Participant
     */
    public function setItem3(int $item3): Participant
    {
        $this->item3 = $item3;
        return $this;
    }

    /**
     * @return int
     */
    public function getItem4(): int
    {
        return $this->item4;
    }

    /**
     * @param int $item4
     * @return Participant
     */
    public function setItem4(int $item4): Participant
    {
        $this->item4 = $item4;
        return $this;
    }

    /**
     * @return int
     */
    public function getItem5(): int
    {
        return $this->item5;
    }

    /**
     * @param int $item5
     * @return Participant
     */
    public function setItem5(int $item5): Participant
    {
        $this->item5 = $item5;
        return $this;
    }

    /**
     * @return int
     */
    public function getItem6(): int
    {
        return $this->item6;
    }

    /**
     * @param int $item6
     * @return Participant
     */
    public function setItem6(int $item6): Participant
    {
        $this->item6 = $item6;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemsPurchased(): int
    {
        return $this->itemsPurchased;
    }

    /**
     * @param int $itemsPurchased
     * @return Participant
     */
    public function setItemsPurchased(int $itemsPurchased): Participant
    {
        $this->itemsPurchased = $itemsPurchased;
        return $this;
    }

    /**
     * @return int
     */
    public function getKillingSprees(): int
    {
        return $this->killingSprees;
    }

    /**
     * @param int $killingSprees
     * @return Participant
     */
    public function setKillingSprees(int $killingSprees): Participant
    {
        $this->killingSprees = $killingSprees;
        return $this;
    }

    /**
     * @return int
     */
    public function getKills(): int
    {
        return $this->kills;
    }

    /**
     * @param int $kills
     * @return Participant
     */
    public function setKills(int $kills): Participant
    {
        $this->kills = $kills;
        return $this;
    }

    /**
     * @return string
     */
    public function getLane(): string
    {
        return $this->lane;
    }

    /**
     * @param string $lane
     * @return Participant
     */
    public function setLane(string $lane): Participant
    {
        $this->lane = $lane;
        return $this;
    }

    /**
     * @return int
     */
    public function getLargestCriticalStrike(): int
    {
        return $this->largestCriticalStrike;
    }

    /**
     * @param int $largestCriticalStrike
     * @return Participant
     */
    public function setLargestCriticalStrike(int $largestCriticalStrike): Participant
    {
        $this->largestCriticalStrike = $largestCriticalStrike;
        return $this;
    }

    /**
     * @return int
     */
    public function getLargestKillingSpree(): int
    {
        return $this->largestKillingSpree;
    }

    /**
     * @param int $largestKillingSpree
     * @return Participant
     */
    public function setLargestKillingSpree(int $largestKillingSpree): Participant
    {
        $this->largestKillingSpree = $largestKillingSpree;
        return $this;
    }

    /**
     * @return int
     */
    public function getLargestMultiKill(): int
    {
        return $this->largestMultiKill;
    }

    /**
     * @param int $largestMultiKill
     * @return Participant
     */
    public function setLargestMultiKill(int $largestMultiKill): Participant
    {
        $this->largestMultiKill = $largestMultiKill;
        return $this;
    }

    /**
     * @return int
     */
    public function getLongestTimeSpentLiving(): int
    {
        return $this->longestTimeSpentLiving;
    }

    /**
     * @param int $longestTimeSpentLiving
     * @return Participant
     */
    public function setLongestTimeSpentLiving(int $longestTimeSpentLiving): Participant
    {
        $this->longestTimeSpentLiving = $longestTimeSpentLiving;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagicDamageDealt(): int
    {
        return $this->magicDamageDealt;
    }

    /**
     * @param int $magicDamageDealt
     * @return Participant
     */
    public function setMagicDamageDealt(int $magicDamageDealt): Participant
    {
        $this->magicDamageDealt = $magicDamageDealt;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagicDamageDealtToChampions(): int
    {
        return $this->magicDamageDealtToChampions;
    }

    /**
     * @param int $magicDamageDealtToChampions
     * @return Participant
     */
    public function setMagicDamageDealtToChampions(int $magicDamageDealtToChampions): Participant
    {
        $this->magicDamageDealtToChampions = $magicDamageDealtToChampions;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagicDamageTaken(): int
    {
        return $this->magicDamageTaken;
    }

    /**
     * @param int $magicDamageTaken
     * @return Participant
     */
    public function setMagicDamageTaken(int $magicDamageTaken): Participant
    {
        $this->magicDamageTaken = $magicDamageTaken;
        return $this;
    }

    /**
     * @return int
     */
    public function getNeutralMinionsKilled(): int
    {
        return $this->neutralMinionsKilled;
    }

    /**
     * @param int $neutralMinionsKilled
     * @return Participant
     */
    public function setNeutralMinionsKilled(int $neutralMinionsKilled): Participant
    {
        $this->neutralMinionsKilled = $neutralMinionsKilled;
        return $this;
    }

    /**
     * @return int
     */
    public function getNexusKills(): int
    {
        return $this->nexusKills;
    }

    /**
     * @param int $nexusKills
     * @return Participant
     */
    public function setNexusKills(int $nexusKills): Participant
    {
        $this->nexusKills = $nexusKills;
        return $this;
    }

    /**
     * @return int
     */
    public function getNexusTakedowns(): int
    {
        return $this->nexusTakedowns;
    }

    /**
     * @param int $nexusTakedowns
     * @return Participant
     */
    public function setNexusTakedowns(int $nexusTakedowns): Participant
    {
        $this->nexusTakedowns = $nexusTakedowns;
        return $this;
    }

    /**
     * @return int
     */
    public function getNexusLost(): int
    {
        return $this->nexusLost;
    }

    /**
     * @param int $nexusLost
     * @return Participant
     */
    public function setNexusLost(int $nexusLost): Participant
    {
        $this->nexusLost = $nexusLost;
        return $this;
    }

    /**
     * @return int
     */
    public function getObjectivesStolen(): int
    {
        return $this->objectivesStolen;
    }

    /**
     * @param int $objectivesStolen
     * @return Participant
     */
    public function setObjectivesStolen(int $objectivesStolen): Participant
    {
        $this->objectivesStolen = $objectivesStolen;
        return $this;
    }

    /**
     * @return int
     */
    public function getObjectivesStolenAssists(): int
    {
        return $this->objectivesStolenAssists;
    }

    /**
     * @param int $objectivesStolenAssists
     * @return Participant
     */
    public function setObjectivesStolenAssists(int $objectivesStolenAssists): Participant
    {
        $this->objectivesStolenAssists = $objectivesStolenAssists;
        return $this;
    }

    /**
     * @return int
     */
    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    /**
     * @param int $participantId
     * @return Participant
     */
    public function setParticipantId(int $participantId): Participant
    {
        $this->participantId = $participantId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPentaKills(): int
    {
        return $this->pentaKills;
    }

    /**
     * @param int $pentaKills
     * @return Participant
     */
    public function setPentaKills(int $pentaKills): Participant
    {
        $this->pentaKills = $pentaKills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPerks()
    {
        return $this->perks;
    }

    /**
     * @param mixed $perks
     * @return Participant
     */
    public function setPerks($perks)
    {
        $this->perks = $perks;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageDealt(): int
    {
        return $this->physicalDamageDealt;
    }

    /**
     * @param int $physicalDamageDealt
     * @return Participant
     */
    public function setPhysicalDamageDealt(int $physicalDamageDealt): Participant
    {
        $this->physicalDamageDealt = $physicalDamageDealt;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageDealtToChampions(): int
    {
        return $this->physicalDamageDealtToChampions;
    }

    /**
     * @param int $physicalDamageDealtToChampions
     * @return Participant
     */
    public function setPhysicalDamageDealtToChampions(int $physicalDamageDealtToChampions): Participant
    {
        $this->physicalDamageDealtToChampions = $physicalDamageDealtToChampions;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageTaken(): int
    {
        return $this->physicalDamageTaken;
    }

    /**
     * @param int $physicalDamageTaken
     * @return Participant
     */
    public function setPhysicalDamageTaken(int $physicalDamageTaken): Participant
    {
        $this->physicalDamageTaken = $physicalDamageTaken;
        return $this;
    }

    /**
     * @return int
     */
    public function getProfileIcon(): int
    {
        return $this->profileIcon;
    }

    /**
     * @param int $profileIcon
     * @return Participant
     */
    public function setProfileIcon(int $profileIcon): Participant
    {
        $this->profileIcon = $profileIcon;
        return $this;
    }

    /**
     * @return string
     */
    public function getPuuid(): string
    {
        return $this->puuid;
    }

    /**
     * @param string $puuid
     * @return Participant
     */
    public function setPuuid(string $puuid): Participant
    {
        $this->puuid = $puuid;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuadraKills(): int
    {
        return $this->quadraKills;
    }

    /**
     * @param int $quadraKills
     * @return Participant
     */
    public function setQuadraKills(int $quadraKills): Participant
    {
        $this->quadraKills = $quadraKills;
        return $this;
    }

    /**
     * @return string
     */
    public function getRiotIdName(): string
    {
        return $this->riotIdName;
    }

    /**
     * @param string $riotIdName
     * @return Participant
     */
    public function setRiotIdName(string $riotIdName): Participant
    {
        $this->riotIdName = $riotIdName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRiotIdTagline(): string
    {
        return $this->riotIdTagline;
    }

    /**
     * @param string $riotIdTagline
     * @return Participant
     */
    public function setRiotIdTagline(string $riotIdTagline): Participant
    {
        $this->riotIdTagline = $riotIdTagline;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Participant
     */
    public function setRole(string $role): Participant
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return int
     */
    public function getSightWardsBoughtInGame(): int
    {
        return $this->sightWardsBoughtInGame;
    }

    /**
     * @param int $sightWardsBoughtInGame
     * @return Participant
     */
    public function setSightWardsBoughtInGame(int $sightWardsBoughtInGame): Participant
    {
        $this->sightWardsBoughtInGame = $sightWardsBoughtInGame;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpell1Casts(): int
    {
        return $this->spell1Casts;
    }

    /**
     * @param int $spell1Casts
     * @return Participant
     */
    public function setSpell1Casts(int $spell1Casts): Participant
    {
        $this->spell1Casts = $spell1Casts;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpell2Casts(): int
    {
        return $this->spell2Casts;
    }

    /**
     * @param int $spell2Casts
     * @return Participant
     */
    public function setSpell2Casts(int $spell2Casts): Participant
    {
        $this->spell2Casts = $spell2Casts;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpell3Casts(): int
    {
        return $this->spell3Casts;
    }

    /**
     * @param int $spell3Casts
     * @return Participant
     */
    public function setSpell3Casts(int $spell3Casts): Participant
    {
        $this->spell3Casts = $spell3Casts;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpell4Casts(): int
    {
        return $this->spell4Casts;
    }

    /**
     * @param int $spell4Casts
     * @return Participant
     */
    public function setSpell4Casts(int $spell4Casts): Participant
    {
        $this->spell4Casts = $spell4Casts;
        return $this;
    }

    /**
     * @return int
     */
    public function getSummoner1Casts(): int
    {
        return $this->summoner1Casts;
    }

    /**
     * @param int $summoner1Casts
     * @return Participant
     */
    public function setSummoner1Casts(int $summoner1Casts): Participant
    {
        $this->summoner1Casts = $summoner1Casts;
        return $this;
    }

    /**
     * @return int
     */
    public function getSummoner1Id(): int
    {
        return $this->summoner1Id;
    }

    /**
     * @param int $summoner1Id
     * @return Participant
     */
    public function setSummoner1Id(int $summoner1Id): Participant
    {
        $this->summoner1Id = $summoner1Id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSummoner2Casts(): int
    {
        return $this->summoner2Casts;
    }

    /**
     * @param int $summoner2Casts
     * @return Participant
     */
    public function setSummoner2Casts(int $summoner2Casts): Participant
    {
        $this->summoner2Casts = $summoner2Casts;
        return $this;
    }

    /**
     * @return int
     */
    public function getSummoner2Id(): int
    {
        return $this->summoner2Id;
    }

    /**
     * @param int $summoner2Id
     * @return Participant
     */
    public function setSummoner2Id(int $summoner2Id): Participant
    {
        $this->summoner2Id = $summoner2Id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    /**
     * @param string $summonerId
     * @return Participant
     */
    public function setSummonerId(string $summonerId): Participant
    {
        $this->summonerId = $summonerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSummonerLevel(): int
    {
        return $this->summonerLevel;
    }

    /**
     * @param int $summonerLevel
     * @return Participant
     */
    public function setSummonerLevel(int $summonerLevel): Participant
    {
        $this->summonerLevel = $summonerLevel;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    /**
     * @param string $summonerName
     * @return Participant
     */
    public function setSummonerName(string $summonerName): Participant
    {
        $this->summonerName = $summonerName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTeamEarlySurrendered(): bool
    {
        return $this->teamEarlySurrendered;
    }

    /**
     * @param bool $teamEarlySurrendered
     * @return Participant
     */
    public function setTeamEarlySurrendered(bool $teamEarlySurrendered): Participant
    {
        $this->teamEarlySurrendered = $teamEarlySurrendered;
        return $this;
    }

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->teamId;
    }

    /**
     * @param int $teamId
     * @return Participant
     */
    public function setTeamId(int $teamId): Participant
    {
        $this->teamId = $teamId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTeamPosition(): string
    {
        return $this->teamPosition;
    }

    /**
     * @param string $teamPosition
     * @return Participant
     */
    public function setTeamPosition(string $teamPosition): Participant
    {
        $this->teamPosition = $teamPosition;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeCCingOthers(): int
    {
        return $this->timeCCingOthers;
    }

    /**
     * @param int $timeCCingOthers
     * @return Participant
     */
    public function setTimeCCingOthers(int $timeCCingOthers): Participant
    {
        $this->timeCCingOthers = $timeCCingOthers;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimePlayed(): int
    {
        return $this->timePlayed;
    }

    /**
     * @param int $timePlayed
     * @return Participant
     */
    public function setTimePlayed(int $timePlayed): Participant
    {
        $this->timePlayed = $timePlayed;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalDamageDealt(): int
    {
        return $this->totalDamageDealt;
    }

    /**
     * @param int $totalDamageDealt
     * @return Participant
     */
    public function setTotalDamageDealt(int $totalDamageDealt): Participant
    {
        $this->totalDamageDealt = $totalDamageDealt;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalDamageDealtToChampions(): int
    {
        return $this->totalDamageDealtToChampions;
    }

    /**
     * @param int $totalDamageDealtToChampions
     * @return Participant
     */
    public function setTotalDamageDealtToChampions(int $totalDamageDealtToChampions): Participant
    {
        $this->totalDamageDealtToChampions = $totalDamageDealtToChampions;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalDamageShieldedOnTeammates(): int
    {
        return $this->totalDamageShieldedOnTeammates;
    }

    /**
     * @param int $totalDamageShieldedOnTeammates
     * @return Participant
     */
    public function setTotalDamageShieldedOnTeammates(int $totalDamageShieldedOnTeammates): Participant
    {
        $this->totalDamageShieldedOnTeammates = $totalDamageShieldedOnTeammates;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalDamageTaken(): int
    {
        return $this->totalDamageTaken;
    }

    /**
     * @param int $totalDamageTaken
     * @return Participant
     */
    public function setTotalDamageTaken(int $totalDamageTaken): Participant
    {
        $this->totalDamageTaken = $totalDamageTaken;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalHeal(): int
    {
        return $this->totalHeal;
    }

    /**
     * @param int $totalHeal
     * @return Participant
     */
    public function setTotalHeal(int $totalHeal): Participant
    {
        $this->totalHeal = $totalHeal;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalHealsOnTeammates(): int
    {
        return $this->totalHealsOnTeammates;
    }

    /**
     * @param int $totalHealsOnTeammates
     * @return Participant
     */
    public function setTotalHealsOnTeammates(int $totalHealsOnTeammates): Participant
    {
        $this->totalHealsOnTeammates = $totalHealsOnTeammates;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalMinionsKilled(): int
    {
        return $this->totalMinionsKilled;
    }

    /**
     * @param int $totalMinionsKilled
     * @return Participant
     */
    public function setTotalMinionsKilled(int $totalMinionsKilled): Participant
    {
        $this->totalMinionsKilled = $totalMinionsKilled;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalTimeCCDealt(): int
    {
        return $this->totalTimeCCDealt;
    }

    /**
     * @param int $totalTimeCCDealt
     * @return Participant
     */
    public function setTotalTimeCCDealt(int $totalTimeCCDealt): Participant
    {
        $this->totalTimeCCDealt = $totalTimeCCDealt;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalTimeSpentDead(): int
    {
        return $this->totalTimeSpentDead;
    }

    /**
     * @param int $totalTimeSpentDead
     * @return Participant
     */
    public function setTotalTimeSpentDead(int $totalTimeSpentDead): Participant
    {
        $this->totalTimeSpentDead = $totalTimeSpentDead;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalUnitsHealed(): int
    {
        return $this->totalUnitsHealed;
    }

    /**
     * @param int $totalUnitsHealed
     * @return Participant
     */
    public function setTotalUnitsHealed(int $totalUnitsHealed): Participant
    {
        $this->totalUnitsHealed = $totalUnitsHealed;
        return $this;
    }

    /**
     * @return int
     */
    public function getTripleKills(): int
    {
        return $this->tripleKills;
    }

    /**
     * @param int $tripleKills
     * @return Participant
     */
    public function setTripleKills(int $tripleKills): Participant
    {
        $this->tripleKills = $tripleKills;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrueDamageDealt(): int
    {
        return $this->trueDamageDealt;
    }

    /**
     * @param int $trueDamageDealt
     * @return Participant
     */
    public function setTrueDamageDealt(int $trueDamageDealt): Participant
    {
        $this->trueDamageDealt = $trueDamageDealt;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrueDamageDealtToChampions(): int
    {
        return $this->trueDamageDealtToChampions;
    }

    /**
     * @param int $trueDamageDealtToChampions
     * @return Participant
     */
    public function setTrueDamageDealtToChampions(int $trueDamageDealtToChampions): Participant
    {
        $this->trueDamageDealtToChampions = $trueDamageDealtToChampions;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrueDamageTaken(): int
    {
        return $this->trueDamageTaken;
    }

    /**
     * @param int $trueDamageTaken
     * @return Participant
     */
    public function setTrueDamageTaken(int $trueDamageTaken): Participant
    {
        $this->trueDamageTaken = $trueDamageTaken;
        return $this;
    }

    /**
     * @return int
     */
    public function getTurretKills(): int
    {
        return $this->turretKills;
    }

    /**
     * @param int $turretKills
     * @return Participant
     */
    public function setTurretKills(int $turretKills): Participant
    {
        $this->turretKills = $turretKills;
        return $this;
    }

    /**
     * @return int
     */
    public function getTurretTakedowns(): int
    {
        return $this->turretTakedowns;
    }

    /**
     * @param int $turretTakedowns
     * @return Participant
     */
    public function setTurretTakedowns(int $turretTakedowns): Participant
    {
        $this->turretTakedowns = $turretTakedowns;
        return $this;
    }

    /**
     * @return int
     */
    public function getTurretsLost(): int
    {
        return $this->turretsLost;
    }

    /**
     * @param int $turretsLost
     * @return Participant
     */
    public function setTurretsLost(int $turretsLost): Participant
    {
        $this->turretsLost = $turretsLost;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnrealKills(): int
    {
        return $this->unrealKills;
    }

    /**
     * @param int $unrealKills
     * @return Participant
     */
    public function setUnrealKills(int $unrealKills): Participant
    {
        $this->unrealKills = $unrealKills;
        return $this;
    }

    /**
     * @return int
     */
    public function getVisionScore(): int
    {
        return $this->visionScore;
    }

    /**
     * @param int $visionScore
     * @return Participant
     */
    public function setVisionScore(int $visionScore): Participant
    {
        $this->visionScore = $visionScore;
        return $this;
    }

    /**
     * @return int
     */
    public function getVisionWardsBoughtInGame(): int
    {
        return $this->visionWardsBoughtInGame;
    }

    /**
     * @param int $visionWardsBoughtInGame
     * @return Participant
     */
    public function setVisionWardsBoughtInGame(int $visionWardsBoughtInGame): Participant
    {
        $this->visionWardsBoughtInGame = $visionWardsBoughtInGame;
        return $this;
    }

    /**
     * @return int
     */
    public function getWardsKilled(): int
    {
        return $this->wardsKilled;
    }

    /**
     * @param int $wardsKilled
     * @return Participant
     */
    public function setWardsKilled(int $wardsKilled): Participant
    {
        $this->wardsKilled = $wardsKilled;
        return $this;
    }

    /**
     * @return int
     */
    public function getWardsPlaced(): int
    {
        return $this->wardsPlaced;
    }

    /**
     * @param int $wardsPlaced
     * @return Participant
     */
    public function setWardsPlaced(int $wardsPlaced): Participant
    {
        $this->wardsPlaced = $wardsPlaced;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWin(): bool
    {
        return $this->win;
    }

    /**
     * @param bool $win
     * @return Participant
     */
    public function setWin(bool $win): Participant
    {
        $this->win = $win;
        return $this;
    }
}
