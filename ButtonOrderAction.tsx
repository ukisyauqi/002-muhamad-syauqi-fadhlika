import { P } from "@/components/ui/p";
import { Colors, metrics } from "@/constants/styles";
import { useOrder } from "@/feature/order/context/order";
import { useColors } from "@/hooks/use-theme";
import { $loading } from "@/store/loading";
import { Order } from "@/types/order";
import { Ionicons } from "@expo/vector-icons";
import { useStore } from "@nanostores/react";
import React, { useCallback, useMemo, useRef, useState } from "react";
import {
  ColorValue,
  StyleSheet,
  TouchableOpacity,
  View,
} from "react-native";
import { Popover } from "react-native-popover-view";
import { confirmOrder } from "../../service/confirm-order";
import { unconfirmOrder } from "../../service/unconfirm-order";
import { getOrderActionRules } from "../../util/order-action-rule";

export default function ButtonOrderAction({ orderData }: { orderData: Order }) {
  const [popoverVisible, setPopoverVisible] = useState<boolean>(false);
  const buttonRef = useRef<TouchableOpacity | null>(null);

  const colors = useColors();
  const styles = createStyles(colors);
  const {
    refetch,
    setShowModalEdit,
    setShowModalView,
    setShowModalConfirmCancel,
    setShowModalTag,
  } = useOrder();

  const loading = useStore($loading);

  const onActionSuccess = () => {
    refetch();
    setPopoverVisible(false);
  };

  const togglePopover = useCallback(() => {
    setPopoverVisible(!popoverVisible);
  }, [popoverVisible]);

  const orderActionRules = useMemo(
    () => getOrderActionRules(orderData),
    [orderData]
  );

  return (
    <View style={styles.container}>
      <TouchableOpacity
        ref={buttonRef}
        onPress={togglePopover}
        style={styles.button}
      >
        <Ionicons
          name="ellipsis-vertical"
          size={18}
          color={colors.textTitle}
        />
      </TouchableOpacity>

      <Popover
        isVisible={popoverVisible}
        from={buttonRef}
        onRequestClose={() => setPopoverVisible(false)}
        placement="bottom"
        offset={5}
        backgroundStyle={{ backgroundColor: 'transparent' }}
        popoverStyle={[styles.popover, { backgroundColor: colors.background }]}
      >
        <View style={styles.popoverContent}>
          {orderActionRules.confirmOrder && (
            <ActionItem
              color={colors.textTitle}
              icon="checkmark-outline"
              label="Konfirmasi"
              loading={loading}
              onPress={() =>
                confirmOrder({
                  id: orderData.id,
                  onSuccess: onActionSuccess,
                })
              }
            />
          )}
          {orderActionRules.unConfirmOrder && (
            <ActionItem
              color={colors.textTitle}
              icon="close-outline"
              label="Batalkan Konfirmasi"
              loading={loading}
              onPress={() =>
                unconfirmOrder({
                  id: orderData.id,
                  onSuccess: onActionSuccess,
                })
              }
            />
          )}
          <ActionItem
            color={colors.textTitle}
            icon="eye-outline"
            label="Lihat"
            loading={loading}
            onPress={() => {
              setShowModalView({
                id: orderData.id,
              });
              setPopoverVisible(false);
            }}
          />
          {orderActionRules.editOrder && (
            <ActionItem
              color={colors.textTitle}
              icon="create-outline"
              label="Edit"
              loading={loading}
              onPress={() => {
                setShowModalEdit({
                  id: orderData.id,
                });
                setPopoverVisible(false);
              }}
            />
          )}

          {orderActionRules.cancelOrder && (
            <ActionItem
              color={colors.error}
              icon="close-circle-outline"
              label="Batalkan"
              loading={loading}
              onPress={() => {
                setShowModalConfirmCancel({
                  id: orderData.id,
                });
                setPopoverVisible(false);
              }}
            />
          )}
          <ActionItem
            color={colors.textTitle}
            icon="pricetags-outline"
            label="Tag"
            loading={loading}
            onPress={() => {
              setShowModalTag({
                id: orderData.id,
                tags: orderData.tags,
              });
              setPopoverVisible(false);
            }}
          />
        </View>
      </Popover>
    </View>
  );
}

function ActionItem({
  color,
  icon,
  label,
  onPress,
  loading,
  hidden,
}: {
  color: ColorValue;
  icon: string;
  label: string;
  onPress: () => void;
  loading: boolean;
  hidden?: boolean;
}) {
  const colors = useColors();
  const styles = createStyles(colors);

  if (hidden) return null;
  return (
    <TouchableOpacity style={styles.item} onPress={onPress} disabled={loading}>
      <Ionicons name={icon as any} size={24} color={color} />
      <P style={{ fontSize: metrics.fontSize.sm, color }}>{label}</P>
    </TouchableOpacity>
  );
}

const createStyles = (colors: Colors) =>
  StyleSheet.create({
    container: {
      alignItems: "center",
      justifyContent: "center",
    },
    button: {
      borderColor: colors.border,
      borderRadius: 8,
      padding: 10,
    },
    buttonText: {
      fontSize: 16,
      color: colors.text,
    },
    popover: {
      borderWidth: 1,
      borderColor: colors.border,
      borderRadius: 8,
      elevation: 5,
      shadowOffset: { width: 0, height: 2 },
      shadowOpacity: 0.25,
      shadowRadius: 3.84,
    },
    popoverContent: {
      paddingVertical: 5,
    },
    item: {
      paddingHorizontal: 15,
      paddingVertical: 8,
      display: "flex",
      flexDirection: "row",
      alignItems: "center",
      gap: 10,
    },
  });